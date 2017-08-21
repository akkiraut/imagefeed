<?php

class UsersController extends Controller
{
	public function actionIndex()
	{
		$this->render('index');
	}

	// Uncomment the following methods and override them if needed
	/*
	public function filters()
	{
		// return the filter configuration for this controller, e.g.:
		return array(
			'inlineFilterName',
			array(
				'class'=>'path.to.FilterClass',
				'propertyName'=>'propertyValue',
			),
		);
	}

	public function actions()
	{
		// return external action classes, e.g.:
		return array(
			'action1'=>'path.to.ActionClass',
			'action2'=>array(
				'class'=>'path.to.AnotherActionClass',
				'propertyName'=>'propertyValue',
			),
		);
	}
	*/

	public function actions()
    {
        /*return array(
            'upload'=>array(
                'class'=>'xupload.actions.XUploadAction',
                'path' =>Yii::app() -> getBasePath() . "/../uploads",
                'publicPath' => Yii::app() -> getBaseUrl() . "/uploads",
            ),
        );*/

        return array(
            'upload'=>array(
                'class'=>'xupload.actions.XUploadAction',
                'path' =>Yii::app() -> getBasePath() . "/../uploads",
                'publicPath' => Yii::app() -> getBaseUrl() . "/uploads",
            ),
        );

    }

    public function actionUploadimages(){
		//$form = new CForm('application.views.site.form', $model);
    	/*$photos = new Photos;

		Yii::import("xupload.models.XUploadForm");
        $model = new XUploadForm;
        $this -> render('upload', array('model'=> $model, 'photos' => $photos ));*/


        $model = new Photos;

	    Yii::import( "xupload.models.XUploadForm" );

	    $photos = new XUploadForm;
	    //print_r($_POST); exit();
	    //Check if the form has been submitted
	    
	    $this->render( 'upload', array(
	        'model' => $model,
	        'photos' => $photos,
	    ) );


		
	}



	public function actionUpload( ) {
		//print_r('asdas'); die;
    Yii::import( "xupload.models.XUploadForm" );
    //Here we define the paths where the files will be stored temporarily
    $path = realpath( Yii::app( )->getBasePath( )."/../images/uploads/tmp/" )."/";
    $publicPath = Yii::app( )->getBaseUrl( )."/images/uploads/";
 
    //This is for IE which doens't handle 'Content-type: application/json' correctly
    header( 'Vary: Accept' );
    if( isset( $_SERVER['HTTP_ACCEPT'] ) 
        && (strpos( $_SERVER['HTTP_ACCEPT'], 'application/json' ) !== false) ) {
        header( 'Content-type: application/json' );
    } else {
        header( 'Content-type: text/plain' );
    }
 
    //Here we check if we are deleting and uploaded file
    if( isset( $_GET["_method"] ) ) {
        if( $_GET["_method"] == "delete" ) {

            if( $_GET["file"][0] !== '.' ) {

                $file = $publicPath.$_GET["file"];
                print_r($_GET["file"]); exit;
                //unlink($file);
                if( is_file( $file ) ) {

                    unlink( $file );
                    print_r($file); exit();
                }
            }
            echo json_encode( true );
        }
    } else {
        $model = new XUploadForm;
        $model->file = CUploadedFile::getInstance( $model, 'file' );
        //We check that the file was successfully uploaded
        //print_r($model); exit();
        if( $model->file !== null ) {
            //Grab some data
            $model->mime_type = $model->file->getType( );
            $model->size = $model->file->getSize( );
            $model->name = $model->file->getName( );
            $model->title = Yii::app()->request->getPost('title', '');
            $model->is_cover_pic = Yii::app()->request->getPost('is_cover_pic', '');

            //print_r($model); exit();
            //(optional) Generate a random name for our file
            //$filename = md5( Yii::app( )->user->id.microtime( ). '_' .$model->name);
            $filename = md5(microtime(true)) . '_' . $model->file->getName( );
            
            //$filename .= ".".$model->file->getExtensionName( );
            //print_r($filename); exit();


            if( $model->validate( ) ) {
                //Move our file to our temporary dir
                $model->file->saveAs( $path.$filename );
                chmod( $path.$filename, 0777 );
                //here you can also generate the image versions you need 
                //using something like PHPThumb
                
 
                //Now we need to save this path to the user's session
                if( Yii::app( )->user->hasState( 'images' ) ) {
                    $userImages = Yii::app( )->user->getState( 'images' );
                } else {
                    $userImages = array();
                }
                 $userImages[] = array(
                    "path" => $path.$filename,
                    //the same file or a thumb version that you generated
                    "thumb" => $path.$filename,
                    "filename" => $filename,
                    'size' => $model->size,
                    'mime' => $model->mime_type,
                    'name' => $model->name,
                    'title'=> $model->title,
                    'cover_pic' => $model->is_cover_pic,

                );
                Yii::app( )->user->setState( 'images', $userImages );
                

                $photos = new Photos;
                //print_r($_POST); exit();
                if( isset($_POST['title']) ) {
                //Assign our safe attributes
                //print_r($model); exit();
                $photos->attributes = $_POST['title'];
                //Start a transaction in case something goes wrong
                //print_r($model); exit();
                $transaction = Yii::app( )->db->beginTransaction( );
                try {
                    //Save the model to the database
                    //print_r($model); die;
                    //print_r($model); exit();
                    /*if($photos->save()){
                        $transaction->commit();
                    }*/


                    if( Yii::app( )->user->hasState( 'images' ) ) {
                    $userImages = Yii::app( )->user->getState( 'images' );
                    //print_r($userImages); exit();
                    //Resolve the final path for our images
                    $path = Yii::app( )->getBasePath( )."/../images/uploads/";
                    //Create the folder and give permissions if it doesnt exists
                    if( !is_dir( $path ) ) {
                        mkdir( $path );
                        chmod( $path, 0777 );
                    }
             
                    //Now lets create the corresponding models and move the files
                    foreach( $userImages as $image ) {
                        if( is_file( $image["path"] ) ) {
                            if( rename( $image["path"], $path.$image["filename"] ) ) {
                                chmod( $path.$image["filename"], 0777 );
                                //$img = new Photos( );
                                $photos->size = $image["size"];
                                $photos->type = $image["mime"];
                                $photos->name = $image["name"];
                                $photos->hash_name = $filename;
                                $photos->title = $image["title"];
                                $photos->cover_pic = $image["cover_pic"];
                                

                                /*$img->source = "/images/uploads/{$this->id}/".$image["filename"];*/
                                $photos->user_id =  Yii::app()->user->getState('role_id');
                                //print_r($photos); exit();

                                if($photos->save()){
                                    $transaction->commit();
                                }
                                $latId = $photos->id;

                                /*if( !$photos->save( ) ) {
                                    //Its always good to log something
                                    Yii::log( "Could not save Image:\n".CVarDumper::dumpAsString( 
                                        $photos->getErrors( ) ), CLogger::LEVEL_ERROR );
                                    //this exception will rollback the transaction
                                    throw new Exception( 'Could not save Image');
                                }
                                else{
                                    echo 'sdasda';
                                }*/
                            }
                        } else {
                            //You can also throw an execption here to rollback the transaction
                            Yii::log( $image["path"]." is not a file", CLogger::LEVEL_WARNING );
                        }
                    }
                    //Clear the user's session
                    Yii::app( )->user->setState( 'images', null );
                }









                } catch(Exception $e) {
                    $transaction->rollback( );
                    Yii::app( )->handleException( $e );
                }
            }

                //Now we need to tell our widget that the upload was succesfull
                //We do so, using the json structure defined in
                // https://github.com/blueimp/jQuery-File-Upload/wiki/Setup
                echo json_encode( array( array(
                        "name" => $model->name,
                        "type" => $model->mime_type,
                        "size" => $model->size,
                        "url" => $publicPath.$filename,
                        "thumbnail_url" => $publicPath."$filename",
                        "delete_url" => $this->createUrl( "upload", array(
                            "_method" => "delete",
                            "file" => $filename,
                            "img_id"=>$latId
                        ) ),
                        "delete_type" => "POST"
                    ) ) );
            } else {
                //If the upload failed for some reason we log some data and let the widget know
                echo json_encode( array( 
                    array( "error" => $model->getErrors( 'file' ),
                ) ) );
                Yii::log( "XUploadAction: ".CVarDumper::dumpAsString( $model->getErrors( ) ),
                    CLogger::LEVEL_ERROR, "xupload.actions.XUploadAction" 
                );
            }
        } else {
            throw new CHttpException( 500, "Could not upload file" );
        }
    }
}


	public function actionForm( ) {
    //$model = new SomeModel;
    Yii::import( "xupload.models.XUploadForm" );
    $photos = new XUploadForm;
    $this->render( 'upload', array(
        /*'model' => $model,*/
        'photos' => $photos,
    ) );
}


}