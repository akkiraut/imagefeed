<?php

/**
 * XUploadAction
 * =============
 * Basic upload functionality for an action used by the xupload extension.
 *
 * XUploadAction is used together with XUpload and XUploadForm to provide file upload funcionality to any application
 *
 * You must configure properties of XUploadAction to customize the folders of the uploaded files.
 *
 * Using XUploadAction involves the following steps:
 *
 * 1. Override CController::actions() and register an action of class XUploadAction with ID 'upload', and configure its
 * properties:
 * ~~~
 * [php]
 * class MyController extends CController
 * {
 *     public function actions()
 *     {
 *         return array(
 *             'upload'=>array(
 *                 'class'=>'xupload.actions.XUploadAction',
 *                 'path' =>Yii::app() -> getBasePath() . "/../uploads",
 *                 'publicPath' => Yii::app() -> getBaseUrl() . "/uploads",
 *                 'subfolderVar' => "parent_id",
 *             ),
 *         );
 *     }
 * }
 *
 * 2. In the form model, declare an attribute to store the uploaded file data, and declare the attribute to be validated
 * by the 'file' validator.
 * 3. In the controller view, insert a XUpload widget.
 *
 * ###Resources
 * - [xupload](http://www.yiiframework.com/extension/xupload)
 *
 * @version 0.3
 * @author Asgaroth (http://www.yiiframework.com/user/1883/)
 */
class XUploadAction extends CAction {

    /**
     * XUploadForm (or subclass of it) to be used.  Defaults to XUploadForm
     * @see XUploadAction::init()
     * @var string
     * @since 0.5
     */
    public $formClass = 'xupload.models.XUploadForm';

    /**
     * Name of the model attribute referring to the uploaded file.
     * Defaults to 'file', the default value in XUploadForm
     * @var string
     * @since 0.5
     */
    public $fileAttribute = 'file';
    public $is_cover_picAttribute = 'is_cover_pic';
    public $titleAttribute = 'title';
    

    /**
     * Name of the model attribute used to store mimeType information.
     * Defaults to 'mime_type', the default value in XUploadForm
     * @var string
     * @since 0.5
     */
    public $mimeTypeAttribute = 'mime_type';

    /**
     * Name of the model attribute used to store file size.
     * Defaults to 'size', the default value in XUploadForm
     * @var string
     * @since 0.5
     */
    public $sizeAttribute = 'size';

    /**
     * Name of the model attribute used to store the file's display name.
     * Defaults to 'name', the default value in XUploadForm
     * @var string
     * @since 0.5
     */
    public $displayNameAttribute = 'name';
    /*public $coverpicAttribute = 'cover';*/

    /**
     * Name of the model attribute used to store the file filesystem name.
     * Defaults to 'filename', the default value in XUploadForm
     * @var string
     * @since 0.5
     */
    public $fileNameAttribute = 'filename';

    /**
     * The query string variable name where the subfolder name will be taken from.
     * If false, no subfolder will be used.
     * Defaults to null meaning the subfolder to be used will be the result of date("mdY").
     *
     * @see XUploadAction::init().
     * @var string
     * @since 0.2
     */
    public $subfolderVar;

    /**
     * Path of the main uploading folder.
     * @see XUploadAction::init()
     * @var string
     * @since 0.1
     */
    public $path;

    /**
     * Public path of the main uploading folder.
     * @see XUploadAction::init()
     * @var string
     * @since 0.1
     */
    public $publicPath;

    /**
     * @var boolean dictates whether to use sha1 to hash the file names
     * along with time and the user id to make it much harder for malicious users
     * to attempt to delete another user's file
     */
    public $secureFileNames = false;

    /**
     * Name of the state variable the file array is stored in
     * @see XUploadAction::init()
     * @var string
     * @since 0.5
     */
    public $stateVariable = 'xuploadFiles';

    /**
     * The resolved subfolder to upload the file to
     * @var string
     * @since 0.2
     */
    private $_subfolder = "";

    /**
     * The form model we'll be saving our files to
     * @var CModel (or subclass)
     * @since 0.5
     */
    private $_formModel;

    /**
     * Initialize the propeties of pthis action, if they are not set.
     *
     * @since 0.1
     */

    //private $lstinsID;

    public function init( ) {

        if( !isset( $this->path ) ) {
            $this->path = realpath( Yii::app( )->getBasePath( )."/../uploads" );
        }

        if( !is_dir( $this->path ) ) {
            mkdir( $this->path, 0777, true );
            chmod ( $this->path , 0777 );
            //throw new CHttpException(500, "{$this->path} does not exists.");
        } else if( !is_writable( $this->path ) ) {
            chmod( $this->path, 0777 );
            //throw new CHttpException(500, "{$this->path} is not writable.");
        }
        if( $this->subfolderVar === null ) {
            $this->_subfolder = Yii::app( )->request->getQuery( $this->subfolderVar, date( "mdY" ) );
        } else if($this->subfolderVar !== false ) {
            $this->_subfolder = date( "mdY" );
        }

        if( !isset($this->_formModel)) {
            $this->formModel = Yii::createComponent(array('class'=>$this->formClass));
        }

        if($this->secureFileNames) {
            $this->formModel->secureFileNames = true;
        }
    }

    /**
     * The main action that handles the file upload request.
     * @since 0.1
     * @author Asgaroth
     */
    public function run( ) {
        $this->sendHeaders();

        $this->handleDeleting() or $this->handleUploading();
    }
    protected function sendHeaders()
    {
        header('Vary: Accept');
        if (isset($_SERVER['HTTP_ACCEPT']) && (strpos($_SERVER['HTTP_ACCEPT'], 'application/json') !== false)) {
            header('Content-type: application/json');
        } else {
            header('Content-type: text/plain');
        }
    }
    /**
     * Removes temporary file from its directory and from the session
     *
     * @return bool Whether deleting was meant by request
     */
    protected function handleDeleting()
    {
        if (isset($_GET["_method"]) && $_GET["_method"] == "delete") {
            $success = false;
            
            if ($_GET["file"][0] !== '.' && Yii::app()->user->hasState($this->stateVariable)) {
                //print_r($this->stateVariable); exit();
                // pull our userFiles array out of state and only allow them to delete
                // files from within that array
                $userFiles = Yii::app()->user->getState($this->stateVariable, array());
                //print_r($userFiles[$_GET["file"]]); exit();

                if ($this->fileExists($userFiles[$_GET["file"]])) {
                    $success = $this->deleteFile($userFiles[$_GET["file"]]);
                    //print_r($success); exit();
                    //print_r($_GET["img_id"]); exit();   

                    /*$model_reg = new Photos;*/
                    /*$model_reg->deleteImg();*/
                    

                    if ($success) {
                        //print_r($userFiles[$_GET["file"]); 
                        $model_reg=Photos::model()->findByPk($_GET["img_id"]);
                        $model_reg->delete();
                        unset($userFiles[$_GET["file"]]); // remove it from our session and save that info
                        
                        Yii::app()->user->setState($this->stateVariable, $userFiles);

                    }
                }
            }
            echo json_encode($success);
            return true;
        }
        return false;
    }

    /**
     * Uploads file to temporary directory
     *
     * @throws CHttpException
     */
    protected function handleUploading()
    {
        $this->init();
        $model = $this->formModel;
        $model->{$this->fileAttribute} = CUploadedFile::getInstance($model, $this->fileAttribute);
       // print_r($model->{$this->fileAttribute}); exit();  

        //print_r($_POST['XUploadForm']['check']); exit();
        /*print_r($model); exit();*/
        /*print_r($_REQUEST); die;*/
        if ($model->{$this->fileAttribute} !== null) {
            $model->{$this->mimeTypeAttribute} = $model->{$this->fileAttribute}->getType();
            $model->{$this->sizeAttribute} = $model->{$this->fileAttribute}->getSize();
            $model->{$this->displayNameAttribute} = $model->{$this->fileAttribute}->getName();
            $model->{$this->fileNameAttribute} = $model->{$this->displayNameAttribute};
            $model->{$this->titleAttribute} = Yii::app()->request->getPost('title', '');
            $model->{$this->is_cover_picAttribute} = Yii::app()->request->getPost('is_cover_pic', '');
            
            /*$model->{$this->coverpicAttribute} = 1;*/
            //print_r($model); exit();
            if ($model->validate()) {

                $path = $this->getPath();

                if (!is_dir($path)) {
                    mkdir($path, 0777, true);
                    chmod($path, 0777);
                }

                $model->{$this->fileAttribute}->saveAs($path . $model->{$this->fileNameAttribute});
                chmod($path . $model->{$this->fileNameAttribute}, 0777);

                $model_reg = new Photos;
                $useriid = Yii::app()->user->getState('role_id');
                //print_r($useriid); exit();
                $images=CUploadedFile::getInstance($model, $this->fileAttribute);
                //print_r(count($images)); exit();

                $newName = md5(microtime(true)) . '_' . $model->{$this->fileAttribute}->getName();
                    //$res=$image->saveAs('uploads/' . $newName);
                /*echo '<pre>';
                print_r($_POST);
                exit;*/
                    $model_reg->event_id = 46;
                    $model_reg->user_id = $useriid;
                    $model_reg->photos_img = $newName;
                    $model_reg->photo_img_org = $images;
                    $model_reg->title = $model->{$this->titleAttribute};

                    /*is_cover_pic*/
                    $model_reg->cover_pic = $model->{$this->is_cover_picAttribute};
                    /*$model_reg->pan_number = '123erd';
                    $model_reg->address = 'sdf234';
                    $model_reg->profile_picture = $newName;*/
                    
                    $model_reg->save();
                    //print_r($model_reg); exit();
                    $lstinsID = $model_reg->id;

                    //print_r($lstinsID); exit();
                    //print_r($model_reg); exit();

                /*if(count($images) > 0){
                foreach ($images as $image) {
                    //echo '<pre>';
                    print_r($image); exit();
                    $newName = md5(microtime(true)) . '_' . $model->{$this->fileAttribute}->getName();
                    //$res=$image->saveAs('uploads/' . $newName);
                    $model_reg->profile_picture = $newName;
                    //print_r($model_reg); exit();
                    $model_reg->save();

                }
            }*/


                $returnValue = $this->beforeReturn();
                if ($returnValue === true) {
                    echo json_encode(array(array(
                        "name" => $model->{$this->displayNameAttribute},
                        "type" => $model->{$this->mimeTypeAttribute},
                        "size" => $model->{$this->sizeAttribute},
                        "url" => $this->getFileUrl($model->{$this->fileNameAttribute}),
                        "thumbnail_url" => $model->getThumbnailUrl($this->getPublicPath()),
                        "delete_url" => $this->getController()->createUrl($this->getId(), array(
                            "_method" => "delete",
                            "file" => $model->{$this->fileNameAttribute},
                            "img_id"=>$lstinsID,
                            'title'=>$model->{$this->titleAttribute},
                        )),
                        "delete_type" => "POST"
                    )));
                } else {
                    echo json_encode(array(array("error" => $returnValue,)));
                    Yii::log("XUploadAction: " . $returnValue, CLogger::LEVEL_ERROR, "xupload.actions.XUploadAction");
                }
            } else {
                echo json_encode(array(array("error" => $model->getErrors($this->fileAttribute),)));
                Yii::log("XUploadAction: " . CVarDumper::dumpAsString($model->getErrors()), CLogger::LEVEL_ERROR, "xupload.actions.XUploadAction");
            }
        } else {
            throw new CHttpException(500, "Could not upload file");
        }
    }

    /**
     * We store info in session to make sure we only delete files we intended to
     * Other code can override this though to do other things with state, thumbnail generation, etc.
     * @since 0.5
     * @author acorncom
     * @return boolean|string Returns a boolean unless there is an error, in which case it returns the error message
     */
    protected function beforeReturn() {
        $path = $this->getPath();

        // Now we need to save our file info to the user's session
        $userFiles = Yii::app( )->user->getState( $this->stateVariable, array());
        //print_r($userFiles); exit();
        $userFiles[$this->formModel->{$this->fileNameAttribute}] = array(
            "path" => $path.$this->formModel->{$this->fileNameAttribute},
            //the same file or a thumb version that you generated
            "thumb" => $path.$this->formModel->{$this->fileNameAttribute},
            "filename" => $this->formModel->{$this->fileNameAttribute},
            'size' => $this->formModel->{$this->sizeAttribute},
            'mime' => $this->formModel->{$this->mimeTypeAttribute},
            'name' => $this->formModel->{$this->displayNameAttribute},
            'title' => $this->formModel->{$this->titleAttribute},
        );
        //print_r($userFiles); exit();
        

        Yii::app( )->user->setState( $this->stateVariable, $userFiles );

        return true;
    }

    /**
     * Returns the file URL for our file
     * @param $fileName
     * @return string
     */
    protected function getFileUrl($fileName) {
        return $this->getPublicPath().$fileName;
    }

    /**
     * Returns the file's path on the filesystem
     * @return string
     */
    protected function getPath() {
        $path = ($this->_subfolder != "") ? "{$this->path}/{$this->_subfolder}/" : "{$this->path}/";
        return $path;
    }

    /**
     * Returns the file's relative URL path
     * @return string
     */
    protected function getPublicPath() {
        return ($this->_subfolder != "") ? "{$this->publicPath}/{$this->_subfolder}/" : "{$this->publicPath}/";
    }

    /**
     * Deletes our file.
     * @param $file
     * @since 0.5
     * @return bool
     */
    protected function deleteFile($file) {
        return unlink($file['path']);
    }

    /**
     * Our form model setter.  Allows us to pass in a instantiated form model with options set
     * @param $model
     */
    public function setFormModel($model) {
        $this->_formModel = $model;
    }

    public function getFormModel() {
        return $this->_formModel;
    }

    /**
     * Allows file existence checking prior to deleting
     * @param $file
     * @return bool
     */
    protected function fileExists($file) {
        return is_file( $file['path'] );
    }
}
