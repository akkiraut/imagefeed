<?php
/* @var $this RegistrationController */
/* @var $model Registration */

$this->breadcrumbs=array(
	'Registrations'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List Registration', 'url'=>array('index')),
	array('label'=>'Create Registration', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#registration-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>
<?php $mangurl = $this->action->Id;?>

<h1><?php echo ($mangurl == 'admin') ? 'Admin ' : 'Checker ' ?> Dashboard</h1>

<!-- <p>
You may optionally enter a comparison operator (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
or <b>=</b>) at the beginning of each of your search values to specify how the comparison should be done.
</p> -->

<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'registration-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		/*'id',*/
		'candidate_number',
		'first_name',
		'last_name',
		/*'marital_status',*/
		array(
			'name'=>'marital_status',
			'value'=>'$data->marital_status == 1 ? \'Married\': \'Unmarried\'',

			//'value'=>'$data->marital_status == 1 ? \'Married\': \'Unmarried\'',
			'type'=>'text',
			),
		/*'number_child',*/
		
		'dob',
		/*'aniversary_date',
		'fchilddob',
		'mobile_no',
		'pan_number',
		'address',
		'other_address',
		'profile_picture',*/
		array(
		    'name'=>'status',
		    //'value'=>'$data->status == 1 ? \'Approved\': \'Pendding\'',

		    'value'=>'$data->status == 1 ? \'Approved\': ($data->status == 2 ? \'Rejected\' : \'Pendding\')',

		    //'value'=>'$data->status == 1 ? \'Approved\': (data->status == 2 ? \'Rejected\' : \'Pendding\')',

		    //'value'=>function($data,$row){
		    	//if($data->status == 1){return "Approved";}elseif($data->status == 2){return "Rejected";}else{return "Pendding";}
		    //}

		    'type'=>'text',

		),
		
		array(
			'class'=>'CButtonColumn',
			'template'=>'{update}{approve}{delete}{view}',
    		'buttons'=>array(
    			'approve' => array
        	(
            'label'=>'Approve',
            'imageUrl'=>Yii::app()->request->baseUrl.'/assets/6b76d80d/gridview/loading.gif',
            'url'=>'Yii::app()->createUrl("registration/approve", array("id"=>$data->id))',
            'options'=>Array(
            		'ajax'=>Array(
            				'type'=>'get',
            				'url'=>'js:$(this).attr("href")',
            				'success'=>'js:function(response){
            					
            					console.log(response);
            					$.fn.yiiGridView.update("registration-grid");
            				}'
            			)
            	)
        	),
    			),

		),

		array(
			'class'=>'CButtonColumn',
			'template'=>'{rejected}',
    		'buttons'=>array(
    			'rejected' => array
        	(
            'label'=>'Rejected',
            'imageUrl'=>Yii::app()->request->baseUrl.'/assets/6b76d80d/gridview/down.gif',
            'url'=>'Yii::app()->createUrl("registration/rejected", array("id"=>$data->id))',
            'options'=>Array(
            		'ajax'=>Array(
            				'type'=>'get',
            				'url'=>'js:$(this).attr("href")',
            				'success'=>'js:function(response){
            					
            					console.log(response);
            					$.fn.yiiGridView.update("registration-grid");
            				}'
            			)
            	)
        	),
    			),

		),



	),
)); ?>

<?php if($mangurl == 'checker'){
	echo '<script type="text/javascript">
		//alert("sdcsdcsd");
		$("#expid").hide();
		</script>';	
}
?>
<div class="form">
<!-- <?php $form=$this->beginWidget('CActiveForm'); ?>

<div class="row submit">
        <?php echo CHtml::submitButton('Export'); ?>
    </div>
 
<?php $this->endWidget(); ?> -->

<form name='expVendor' id="expid" style="float: left;" action="../registration/Excel" method="post">
    <input type="submit" value="Export Into Excel" name="getVendor">
</form>
</div>



