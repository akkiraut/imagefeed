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
				'actions'=>array('index','view'),
				'users'=>array('*'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','update','approve','rejected','Excel'),
				'users'=>array('@'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','delete'),
				'users'=>array('admin'),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
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
		$model=new Registration;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Registration']))
		{
			$model->attributes=$_POST['Registration'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->id));
		}

		$this->render('create',array(
			'model'=>$model,
		));
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{
		$model=$this->loadModel($id);
		$modelhsrt = new History;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Registration']))
		{

			$tlrt = $modelhsrt->histmaintain($id);
			//print_r($tlrt[0]['id']); exit();
			//$Vlsttken[0]['date'];
			//$modelhsrt->attributes->$tlrt;
			//$modelhsrt
			//$modelhsrt->save();
			$model->attributes=$_POST['Registration'];
			
			//$modelhsrt->attributes=$_POST['Registration'];
			//$modelhsrt->id = $id;
			
			if($model->save())
				$this->redirect(array('view','id'=>$model->id));
		}

		$this->render('update',array(
			'model'=>$model,
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
		$dataProvider=new CActiveDataProvider('Registration');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
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
	    1 => array ('Candidate Number', 'First Name','Last Name','Marital Status','number_child','dob','aniversary_date','child_id','mobile_no','address','other_address','profile_picture','status'));
	    foreach ($viewData as $value) {
	    	
	   	if($value['status'] == 0){$sttus = 'Pendding';}
	   		elseif($value['status'] == 1){$sttus = 'Approved';}else{$sttus = 'Rejected';}
	    $data[]=array($value['candidate_number'], $value['first_name'], $value['last_name'],$value['marital_status'],$value['number_child'], $value['dob'], $value['aniversary_date'], $value['child_id'], $value['mobile_no'], $value['address'], $value['other_address'], $value['profile_picture'],  $sttus);
	    
	   /* array('Schwarz', 'Oliver', 'Oliver', 'Oliver', 'Oliver', 'Oliver', 'Oliver'),
	    array('Test', 'Peter', 'Peter', 'Peter', 'Peter', 'Peter', 'Peter')*/

		}


		Yii::import('application.extensions.phpexcel.JPhpExcel');
		$xls = new JPhpExcel('UTF-8', false, 'My Test Sheet');
		$xls->addArray($data);
		$xls->generateXML('my-test');
	}

}
