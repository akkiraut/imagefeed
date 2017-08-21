<?php
/* @var $this RegistrationController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Registrations',
);

$this->menu=array(
	array('label'=>'Create Registration', 'url'=>array('create')),
	array('label'=>'Manage Registration', 'url'=>array('admin')),
);
?>

<h1>Registrations</h1>




<?php
				$this->widget('xupload.XUpload', array(
				                    'url' => Yii::app()->createUrl("registration/upload"),
				                    'model' => $model,
				                    'attribute' => 'file',
				                    'multiple' => true,
				));
			?>
