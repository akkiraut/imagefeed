<?php

class RegistrationController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/column2';

	/**
	 * @return array action filters
	 */
	public function filters()
	{
		return array(
			'accessControl', // perform access control for CRUD operations
			'postOnly + delete', // we only allow deletion via POST request
		);
	}

	/**
	 * Specifies the access control rules.
	 * This method is used by the 'accessControl' filter.
	 * @return array access control rules
	 */
	public function accessRules()
	{
		return array(
			array('allow',  // allow all users to perform 'index' and 'view' actions
				'actions'=>array('index','view','Uploadimages'),
				'users'=>array('*'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','update', 'loadChildByAjax','loadskill','Uploadimages','approve','rejected', 'Excel','Checker','UploadLogo'),
				'users'=>array('@'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','delete','Uploadimages'),
				'users'=>array('admin'),
			),
				/*array('deny',  // deny all users
					'users'=>array('*'),
				),*/
		);
	}


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


	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionView($id)
	{
		$this->render('view',array(
			'model'=>$this->loadModel($id),
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		echo Yii::app()->user->getState('role');
		echo Yii::app()->user->getState('role_id');
		$model=new Registration;
		$model1=new ScanDocument;


		//echo phpinfo(); die();

		$this->performAjaxValidation($model);
		
		//print_r($_POST);die;
		if (isset($_POST['Registration']))
        {
            
            $model->attributes = $_POST['Registration'];
         //// echo '<pre>';
         //print_r($_POST);die;
             //print_r($_REQUEST);die;
           //return;
            //print_r($_POST['Qualification']);exit();
            if (isset($_POST['Qualification']) || isset($_POST['Skill']))
            {           	
                $model->qualification = $_POST['Qualification'];
                $model->saveWithRelated('qualification');
                $model->skill = $_POST['Skill'];
                $model->saveWithRelated('skill');
            }
            //print_r($_POST['Qualification']);     
            if($model->validate()){

            // $model=new Item;
            $images=CUploadedFile::getInstancesByName('images');
            //print_r($images); exit();	
            if(count($images) > 0){
	            foreach ($images as $image) {
	            	//echo '<pre>';
	            	
	            	$newName = md5(microtime(true)) . '_' . $image->name;
	              	$res=$image->saveAs('uploads/' . $newName);
	              	$model->profile_picture = $newName;
	            }
        	}
        	//print_r($_POST['ScanDocument']);exit();
        	//if(isset($_FILES['ScanDocument'])){
        		
        		//$scanDocNm = $_FILES['ScanDocument']['name'];
        	
            //print_r($images2); exit();
            //print_r($_FILES['ScanDocument']); exit();	
            //print_r($model->id); exit();
            
             //}                
           
            	 //print_r($_POST);die;
            	  //echo '<pre>';
        	 //$lstinserId = $model->id;
             //$model->candidate_number = $lstinserId+1;

			/*$last_invoice = Registration::model()->find(array('candidate_number'=>'id DESC'))
			print_r($last_invoice);
			exit();*/
            if ($model->save()){
            	$lstinserId = $model->id;
            	
            	$canNum = time().rand().$lstinserId;
            	//print_r($canNum);	exit();

            	$model->UpdatecanNum($canNum, $lstinserId);
            	
             	//$model->candidate_number = rand(1,3).'_'.$lstinserId;
            	//echo 'Record Insert successful';
            	/*if(Yii::app()->request->isAjaxRequest){
                	//$this->redirect(array('view', 'id' => $model->id));
                	//echo 'Record Insert successful';
                	//Yii::app()->user->setFlash('success', "Data1 saved!");
                	 //echo json_encode(array('redirect'=>$this->createUrl('/order/xxx')));
                	//exit();
					}else{
            		//$this->redirect(array('view', 'id' => $model->id));
            		echo 'Something Went Wrong';
            	}*/

            	/*Yii::app()->user->setFlash('register.success', array('id' => $model->id,
            	));
            	$this->refresh();
            	if (Yii::app()->user->hasFlash('register.success'))
			    {
			         echo Yii::app()->user->getFlash('register.success');
			        return;
			    }*/
			    $images2=CUploadedFile::getInstancesByName('upload_filename');
			    //echo  count($images2); exit();
			    if(count($images2) > 0){
			    	//$i = 0;
	            foreach ($images2 as $image2) {
	            	//echo '<pre>';
	            	
	            	$newName2 = md5(microtime(true)) . '_' . $image2->name;
	              	$res=$image2->saveAs('uploads/' . $newName2);
	              	
	              	$model2=new ScanDocument;
	              	/*echo '<pre>';
	              	 print_r($model2); exit();*/

	              	//$model2->attributes = $_POST['ScanDocument'];
	              	//$model2->upload_filename = $newName2;
	              	$model2->upload_filename = $newName2;
	              	$model2->registration_id = $model->id;
	              	//$model2->name = 'Akshay';
	              	//$model2->created = '2017-07-31 11:43:22';
	              	/*if($model1->save()){
	              		print_r('Value save In database ');
	              	}eles{
	              		print_r('Va;ue not save in database');
	              	}*/
	              	//print_r($model2); //exit();
	              	//echo '<pre>';
	              	 //print_r($model2);  
	              	//echo '<pre>';
	              	 //print_r($model2);	
	              	 //exit();
	              	//echo $newName2;
	              	
	              	//$i++;
	              	//echo $i;
	              	 if($model2->save()){
	              	 	//$model2->getErrors();
	              	 	//print_r($model2->getErrors());
	              	 	//print_r($model2) ;
	              	 }else{
	              	 print_r($model2->getErrors());
	              	 	echo "not done"; exit();
	              	 }
	              	//exit();
	              	//print_r($model1->save()); exit();

	            }
	            //exit();
        	}
        	/*$this->redirect(array('view', 'id' => $model->id));*/
			   echo  '<script type="text/javascript">window.location.href="http://localhost/tejora/index.php/registration/view/'.$model->id.'"; </script>';

			    //print_r($rredi); exit();

            }
            //print_r($_POST);die;
            else{
            	print_r($model->getErrors());exit();
                $model->addError('qualification', 'Error occured while saving qualification.');
            }

          
        }
        }

		$this->render('create',array(
			'model'=>$model,
			'model1'=>$model1,
		));
	}

	public function actionUploadimages(){
		//$form = new CForm('application.views.site.form', $model);
		Yii::import("xupload.models.XUploadForm");
        $model = new XUploadForm;
        $this -> render('upload', array('model' => $model, ));
		
	}

	/*Upload image testing fuction*/


    public function actionUploadLogo() {

	#	print '<pre>'; print_r($_FILES);
    //   print 'FFF='.$_FILES["template_logo"]["name"];
    #    die;
        //$path = Yii::getPathOfAlias('webroot')."/template_logos/" . $_FILES["template_logo"]["name"];
        //move_uploaded_file($_FILES['template_logo']["tmp_name"], $path);
        // print '<pre>'; print_r($_FILES); 
//       echo $_FILES["template_logo"]["name"];
//        die;

    	//print_r($logo); exit();
    	 $data = $_POST['logo'];
    	 print_r($data);
        $error = "";
        $msg = "";
        $fileElementName = 'template_logo';
        $extensions = array("jpeg", "jpg", "png","gif");
        $file_split = explode('.', $_FILES['template_logo']['name']);
        $file_name = $file_split[0];
        $file_ext = end($file_split);
        if (!empty($_FILES[$fileElementName]['error'])) {
            switch ($_FILES[$fileElementName]['error']) {

                case '1':
                    $error = 'The uploaded file exceeds the upload_max_filesize directive in php.ini';
                    break;
                case '2':
                    $error = 'The uploaded file exceeds the MAX_FILE_SIZE directive that was specified in the HTML form';
                    break;
                case '3':
                    $error = 'The uploaded file was only partially uploaded';
                    break;
                case '4':
                    $error = 'No file was uploaded.';
                    break;

                case '6':
                    $error = 'Missing a temporary folder';
                    break;
                case '7':
                    $error = 'Failed to write file to disk';
                    break;
                case '8':
                    $error = 'File upload stopped by extension';
                    break;
                case '999':
                default:
                    $error = 'No error code avaiable';
            }
        } elseif (empty($_FILES['template_logo']['tmp_name']) || $_FILES['template_logo']['tmp_name'] == 'none') {
            $error = 'No file was uploaded..';
        }
        //    elseif(($_FILES['template_logo']['type']=="image/jpeg") || $_FILES['template_logo']['type'] == "image/gif" || $_FILES['template_logo']['type'] == "image/png" || $_FILES['template_logo']['type'] == "image/jpg")
        //	{
        //		$error = 'Unsupported filetype uploaded.';
        //	}
        else {
            $filename = $file_name . '_' . time() . '.' . $file_ext;
            //$msg .= " File Name: " . $_FILES['fileToUpload']['name'].'_'.time() . ", ";
            //$msg .= " File Size: " . @filesize($_FILES['fileToUpload']['tmp_name']);
            //for security reason, we force to remove all uploaded file
            $path = Yii::getPathOfAlias('webroot') . "/template_logos/" . $_FILES["template_logo"]["name"];
            move_uploaded_file($_FILES["template_logo"]["tmp_name"], $path);
			//chmod($path, 0777);
            $msg = $_FILES["template_logo"]["name"];
            //@unlink($_FILES['fileToUpload']);		
        }
        echo "{";
        echo "error: '" . $error . "',\n";
        echo "msg: '" . $msg . "'\n";
        echo "}";
    }




	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{
		$model=$this->loadModel($id);
		$model1=new ScanDocument;

		// Uncomment the following line if AJAX validation is needed
		$this->performAjaxValidation($model);

		if(isset($_POST['Registration']))
		{
			$model->attributes=$_POST['Registration'];
			//print_r($_POST['Skill']);exit();
			if (isset($_POST['Qualification']) || isset($_POST['Skill']))
            {           	
                $model->qualification = $_POST['Qualification'];

                $model->saveWithRelated('qualification');
                //print_r($model->getErrors()); exit();
                $model->skill = $_POST['Skill'];
                //print_r($model); exit();
                $model->saveWithRelated('skill');
            }
			if($model->save())
				//$this->redirect(array('view','id'=>$model->id));
				echo  '<script type="text/javascript">window.location.href="http://localhost/tejora/index.php/registration/view/'.$model->id.'"; </script>';
		}

		$this->render('update',array(
			'model'=>$model,
			'model1'=>$model1,
		));
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id)
	{
		$this->loadModel($id)->delete();

		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		/*$dataProvider=new CActiveDataProvider('Registration');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));*/

		 
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Registration('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Registration']))
			$model->attributes=$_GET['Registration'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	public function actionChecker()
	{
		$model=new Registration('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Registration']))
			$model->attributes=$_GET['Registration'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	public function actionLoadChildByAjax($index)
    {

        $model = new Qualification;
        $this->renderPartial('add_qualification', array(
            'model' => $model,
            'index' => $index,
        ));
       // debug('hiii');
    }


    public function actionLoadSkill($index)
    {

        $model = new Skill;
        $this->renderPartial('add_skill', array(
            'model' => $model,
            'index' => $index,
        ));
       // debug('hiii');
    }



// public function actionView()
//     { 

//       //debug($_POST);
//         $model=new Item;
//            if($images=CUploadedFile::getInstancesByName('images')){
//             foreach ($images as $image) {
//               $res=$image->saveAs('uploads/'.$image->name);
//             }
                             
//             }
//       $this->render('view', array('model'=>$model));
//     }




	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Registration the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Registration::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Registration $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='registration-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}

	public function actionapprove($id){
		//print_r($id); exit();
		$model=new Registration;
		$model->changeStatus($id);
	}
	public function actionrejected($id){
		//print_r($id); exit();

		$model=new Registration;
		$model->rejctMker($id);
	}

	public function actionExcel(){

		$model = new Registration;
		$viewData = $model->getAll();

		//print_r($viewData);
		//exit();		
		$sttus = '';
		$data = array(
	    1 => array ('Candidate Number', 'First Name','Last Name','Marital Status','number_child','dob','aniversary_date','fchilddob','mobile_no','address','other_address','profile_picture','status'));
	    foreach ($viewData as $value) {
	    	
	   	if($value['status'] == 0){$sttus = 'Pendding';}
	   		elseif($value['status'] == 1){$sttus = 'Approved';}else{$sttus = 'Rejected';}
	    $data[]=array($value['candidate_number'], $value['first_name'], $value['last_name'],$value['marital_status'],$value['number_child'], $value['dob'], $value['aniversary_date'], $value['fchilddob'], $value['mobile_no'], $value['address'], $value['other_address'], $value['profile_picture'],  $sttus);
	    
	   /* array('Schwarz', 'Oliver', 'Oliver', 'Oliver', 'Oliver', 'Oliver', 'Oliver'),
	    array('Test', 'Peter', 'Peter', 'Peter', 'Peter', 'Peter', 'Peter')*/

		}


		Yii::import('application.extensions.phpexcel.JPhpExcel');
		$xls = new JPhpExcel('UTF-8', false, 'My Test Sheet');
		$xls->addArray($data);
		$xls->generateXML('my-test');
	}


}
