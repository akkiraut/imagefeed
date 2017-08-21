<?php
/* @var $this RegistrationController */
/* @var $model Registration */
/* @var $form CActiveForm */
?>

<div class="form">

<?php 
//$form=$this->beginWidget('CActiveForm', array(
	//'id'=>'registration-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	//'enableAjaxValidation'=>false,
// $this->action->Id;
//print_r($this->action->Id);
/*$redurl = '';
 //print_r($redurl); exit();
$mangurl = $this->action->Id;
if($mangurl == 'update'){

  $redurl = "'.CHtml::normalizeUrl(array("registration/update")).'";
}else{
  $redurl = "'.CHtml::normalizeUrl(array("registration/create")).'";
}
*/


$mangurl = $this->action->Id;
//print_r($mangurl);
if($this->action->Id == 'update'){
  //print_r("I am in");
  $redurl = CHtml::normalizeUrl(array("registration/update/".$model->id));
}else{
  $redurl = CHtml::normalizeUrl(array("registration/create"));
}

//)); ?><?php $form=$this->beginWidget('CActiveForm', array(
        'id'=>'registration-form',
        'enableAjaxValidation'=>true,
        'enableClientValidation'=>true,
          'clientOptions'=>array(
              'validateOnSubmit'=>true,
              'htmlOptions' => array('enctype' => 'multipart/form-data'),
              'afterValidate'=>'js:function(form,data,hasError){
                          if(!hasError){
                            var data = new FormData($("#registration-form")[0]);
                                  $.ajax({
                                          "type":"POST",
                                          "url":"'.$redurl.'",
                                          "data":data,
                                          "processData": false,
                                          "contentType": false,
                                          "success":function(data){$("#test").html(data);},
                                          
                                          });
                                  }
                          }'
          ),
)); ?>


	<p class="note">Fields with <span class="required">*</span> are required.</p>
  <div id="test"></div>
	<?php echo $form->errorSummary($model); ?>

	<!-- <div class="row">
		<?php echo $form->labelEx($model,'candidate_number'); ?>
		<?php echo $form->textField($model,'candidate_number'); ?>
		<?php echo $form->error($model,'candidate_number'); ?>
	</div> -->

	<div class="row">
		<?php echo $form->labelEx($model,'first_name'); ?>
		<?php echo $form->textField($model,'first_name',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'first_name'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'last_name'); ?>
		<?php echo $form->textField($model,'last_name',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'last_name'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'marital_status'); ?>
		<?php //echo $form->textField($model,'marital_status'); ?>
		<?php //echo $form->error($model,'marital_status'); 
		$status=array(1=>'Married',2=>'Unmarried');?>
	 	<?php  echo $form->dropDownList($model, 'marital_status',$status, array('prompt'=>'Select')); ?>
	    <?php echo $form->error($model,'marital_status'); ?>
	</div>

	<div class="row" id='number_child'>
		<?php echo $form->labelEx($model,'number_child'); ?>
		<?php echo $form->textField($model,'number_child'); ?>
		<?php echo $form->error($model,'number_child'); ?>
	</div>

	<div class="row">

	
<?php
echo $form->labelEx($model,'dob'); 
     $this->widget('zii.widgets.jui.CJuiDatePicker', array(
        'model'=>$model,
        'attribute'=>'dob',
                 'value'=>$model->dob,
        //additional javascript options for the date picker plugin
        'options'=>array(
            'dateFormat'=>'yy-mm-dd',
            'showAnim'=>'fold',
                        'debug'=>true,
            'datepickerOptions'=>array('changeMonth'=>true, 'changeYear'=>true),
        ),
        'htmlOptions'=>array('style'=>'height:20px;'),
     ));
    
echo $form->error($model,'dob'); 
?>
</div>

	<div class="row">
		<?php echo $form->labelEx($model,'aniversary_date'); 
     $this->widget('zii.widgets.jui.CJuiDatePicker', array(
        'model'=>$model,
        'attribute'=>'aniversary_date',
                 'value'=>$model->dob,
        //additional javascript options for the date picker plugin
        'options'=>array(
            'dateFormat'=>'yy-mm-dd',
            'showAnim'=>'fold',
                        'debug'=>true,
            'datepickerOptions'=>array('changeMonth'=>true, 'changeYear'=>true),
        ),
        'htmlOptions'=>array('style'=>'height:20px;'),
     ));
     echo $form->error($model,'aniversary_date'); 

    ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'fchilddob'); ?>

    <?php

      $this->widget('zii.widgets.jui.CJuiDatePicker', array(
        'model'=>$model,
        'attribute'=>'fchilddob',
                 'value'=>$model->fchilddob,
        //additional javascript options for the date picker plugin
        'options'=>array(
            'dateFormat'=>'yy-mm-dd',
            'showAnim'=>'fold',
                        'debug'=>true,
            'datepickerOptions'=>array('changeMonth'=>true, 'changeYear'=>true),
        ),
        'htmlOptions'=>array('style'=>'height:20px;'),
     ));

    ?>

		<!-- <?php echo $form->textField($model,'fchilddob'); ?> -->
		<?php echo $form->error($model,'fchilddob'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'mobile_no'); ?>
		<?php echo $form->textField($model,'mobile_no'); ?>
		<?php echo $form->error($model,'mobile_no'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'pan_number'); ?>
		<?php echo $form->textField($model,'pan_number',array('size'=>20,'maxlength'=>20)); ?>
		<?php echo $form->error($model,'pan_number'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'other_address'); ?>
		<?php echo $form->textField($model,'address',array('size'=>60,'maxlength'=>60)); ?>
		<?php echo $form->error($model,'address'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'other_address'); ?>
		<?php echo $form->textField($model,'other_address',array('size'=>60,'maxlength'=>60)); ?>
		<?php echo $form->error($model,'other_address'); ?>
	</div>
   	<div class="row" style="float: left; clear: both;">
    <?php echo CHtml::link('Add Qualification', '#', array('id' => 'loadChildByAjax'));?>
  <div id="qualification">
        <?php
        $index = 0;
        foreach ($model->qualification as $id => $child):
            //$this->renderPartial('registration/LoadChildByAjax', array(
          $this->renderPartial('add_qualification', array(
                'model' => $child,
                'index' => $id,
                'display' => 'block'
            ));
            $index++;
        endforeach;
        ?>
    </div>

    </div>


    <div class="row" style="float: left; clear: both;">
    <?php echo CHtml::link('Add Skills', '#', array('id' => 'loadskill'));?>
  <div id="skill">
        <?php
        $index1 = 0;
       // print_r($model->skill);
        foreach ($model->skill as $id => $child):
            $this->renderPartial('add_skill', array(
                'model' => $child,
                'index' => $id,
                'display' => 'block'
            ));
            $index1++;
        endforeach;
        ?>
    </div>

    </div>
<br>

<?php
// $form = $this->beginWidget(
//     'CActiveForm',
//     array(
//         'id' => 'upload-form',
//         'enableAjaxValidation' => false,
//         'htmlOptions' => array('enctype' => 'multipart/form-data'),
//     )
// );
// ...
// echo $form->labelEx($model, 'image');
// echo $form->fileField($model, 'image');
// echo $form->error($model, 'image');

  //echo $form->labelEx($model,'profile_picture'); 
 //$this->widget('CMultiFileUpload',array('name'=>'images','accept'=>'jpeg|jpg|gif'));
?>

<div class="row" style="float: left; clear: both;">
     <?php echo $form->labelEx($model, 'profile_picture'); ?>
     <?php 
        $this->widget('CMultiFileUpload', array(
            'name' => 'images',
            'accept' => 'jpeg|jpg|gif|png', 
            'duplicate' => 'Duplicate file', 
            'denied' => 'Invalid file type', 
          ));
          //echo CHtml::activeFileField($model, 'image');
     ?>
    <!-- <?php echo $form->fileField($model, 'profile_picture'); ?> -->
    <?php echo $form->error($model, 'profile_picture'); ?>

</div>

<!-- <?php if($model->isNewRecord!='1'){ ?>
<div class="row">
     <?php //print_r($model->getErrors()); exit;?>

      <img style="float: left; clear: both" width="200px" src="<?php echo Yii::app()->request->baseUrl.'/uploads/'. $model->profile_picture;?> " />

</div>
<?php }?> -->

<div class="row" style="float: left; clear: both;"> 
     <?php echo $form->labelEx($model1, 'upload_filename'); ?>
     <?php 
        $this->widget('CMultiFileUpload', array(
            'model'=>$model1,
            'attribute'=>'upload_filename',
            'name'=>'upload_filename',
            'accept' => 'jpeg|jpg|gif|png', 
            'duplicate' => 'Duplicate file', 
            'denied' => 'Invalid file type', 
          ));
     ?>
    <!-- <?php echo $form->fileField($model1, 'name'); ?> -->
    <?php echo $form->error($model1, 'upload_filename'); ?>

<!-- <?php if($model->isNewRecord!='1'){ ?>
<div class="row">
     <?php //print_r($model->getErrors()); exit;?>

      <img style="float: left; clear: both" width="200px" src="<?php echo Yii::app()->request->baseUrl.'/uploads/'. $model1->upload_filename ;?> " />

</div>
<?php }?>
 -->
</div>


<?php 

//$data=array('Pan'=>'Pan','Aadhar Card'=>'Aadhar Card','Passport'=>'Passport');
//$list = CHtml::listData($data));

 //echo CHtml::dropDownList($data,
        //  array('empty' => '(Select a category'));
//echo $this->renderPartial('upload_profile', array('model'=>$model)); 
//echo $form->dropDownList($model, 'profile_picture',
 //array('Pan' => 'Pan', 'Aadhar Card' => 'Aadhar Card','Passport'=>'Passport')
 //); 

 // echo $this->renderPartial('registration/scan_document', array(
 //                'model' => 'ScanDocument',
 //                'display' => 'block'
 //            ));


//$scandocument = new ScanDocument;
//echo $newForm = RegistrationController::renderPartial('scan_document',array('model'=>'ScanDocument'),true); // "/objects

//$this->renderPartial('application.views.registration.scan_document',array('model'=>'ScanDocument'));

// ...
//echo CHtml::submitButton('Submit');
?>
	<!-- <div class="row">
		<?php echo $form->labelEx($model,'profile_picture'); ?>
		<?php echo $form->textField($model,'profile_picture',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'profile_picture'); ?>
	</div> -->
<?php //echo $form->labelEx($model,'Upload scan copy documents'); ?>
   <?php  //$this->widget('CMultiFileUpload',array('name'=>'images','accept'=>'jpeg|jpg|gif'));?>

	<div class="row buttons" style="float: left; clear: both;">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save', array('id'=>'btn')); ?>
         <?php //echo CHtml::Button('Create',array('onclick'=>'send();')); ?> 

	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->

<?php
Yii::app()->clientScript->registerCoreScript('jquery');
Yii::app()->clientScript->registerScript('dropdown', '
	$("#number_child").hide();
   $("#Registration_marital_status").change(function() {
      var content = $("#Registration_marital_status option:selected").text();
      //alert(content);
         if(content == "Married"){
         	//alert("hii");
      $("#number_child").show();
     }else{
     	   $("#number_child").hide();
     	  }
   });

');




?>
<!-- <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script> -->
<script type="text/javascript">
/*<![CDATA[*/
 var rowCount = 1;

 	function addMoreRows(frm) {

 	rowCount ++;

 	var recRow = '<p id="rowCount'+rowCount+'"><tr><td><input name="" type="text" size="6%"   /></td><td><input name="" type="text"  size="6%" /></td><td><input name="" type="text"   size="6%"/></td><td><input name="" type="text"  size="6%"  /></td><td><input name="" type="text"  size="6%"/></td></tr> <a href="javascript:void(0);" onclick="removeRow('+rowCount+');">Delete</a></p>';

 	jQuery('#addedRows').append(recRow);

 	}
 

 	function removeRow(removeNum) {

 	jQuery('#rowCount'+removeNum).remove();

 	}



function send()
 {
 
   var data=$("#registration-form").serialize();
   //$('.button').click(function() {
            var acttion = $("#btn").val();
     //   });
  if(acttion == 'Save'){
      var url = '<?php echo Yii::app()->createAbsoluteUrl("registration/update/".$model->id); ?>';
  }else{
    var url = '<?php echo Yii::app()->createAbsoluteUrl("registration/create"); ?>';
  }
 
alert(url);
  $.ajax({
   type: 'POST',
    url: url,
   data:data,
success:function(data){
                //alert(data); 
              },
   error: function(data) { // if error occured
         alert("Error occured.please try again");
         alert(data);
    },
 
  dataType:'html'
  });
 
}












/*]]>*/
</script>
<?php 
Yii::app()->clientScript->registerCoreScript('jquery');
Yii::app()->clientScript->registerScript('loadChildByAjax', '
var _index = ' . $index . ';
$("#loadChildByAjax").click(function(e){
	//alert("hii");
    e.preventDefault();

    var _url = "' . Yii::app()->controller->createUrl("loadChildByAjax", array("load_for" => $this->action->id)) . '&index="+_index;

//alert(_url);
    $.ajax({
        url: _url,
        success:function(response){
        	//alert(response);
            $("#qualification").append(response);
            $("#qualification .crow").last().animate({
                opacity : 1, 
                left: "+50", 
                height: "toggle"
            });
        }
    });
    _index++;
});
', CClientScript::POS_END);


Yii::app()->clientScript->registerScript('loadskill', '
var _index1 = ' . $index1 . ';
$("#loadskill").click(function(e){
	//alert("hii");
    e.preventDefault();

    var _url = "' . Yii::app()->controller->createUrl("loadskill", array("load_for" => $this->action->id)) . '&index="+_index1;
    //alert(_url);
    $.ajax({
        url: _url,
        success:function(response){
        	//alert(response);
            $("#skill").append(response);
            $("#skill .crow").last().animate({
                opacity : 1, 
                left: "+50", 
                height: "toggle"
            });
        }
    });
    _index1++;
});
', CClientScript::POS_END);



?>

<?php
Yii::app()->clientScript->registerScript('deleteChild', "
function deleteChild(elm, index)
{
	//alert('hii');
    element=$(elm).parent().parent();
    /* animate div */
    $(element).animate(
    {
        opacity: 0.25, 
        left: '+=50', 
        height: 'toggle'
    }, 500,
    function() {
        /* remove div */
        $(element).remove();
    });
}", CClientScript::POS_END);


Yii::app()->clientScript->registerScript('deleteSkill', "
function deleteSkill(elm, index)
{
	//alert('hii');
    element1=$(elm).parent().parent();
   // alert(element1);
    /* animate div */
    $(element1).animate(
    {
        opacity: 0.25, 
        left: '+=50', 
        height: 'toggle'
    }, 500,
    function() {
    	//alert(element1);
        /* remove div */
        $(element1).remove();
    });
}", CClientScript::POS_END);
?>