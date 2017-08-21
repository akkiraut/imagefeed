


<h1>File upload</h1>
		<p>Please upload an image</p>
		<div class="form">
			<?php
				$form=$this->beginWidget('CActiveForm', array(
					'id'=>'topic-form',
					'enableAjaxValidation'=>true,
					'htmlOptions' => array('enctype' => 'multipart/form-data'),
					
				));
			?>
			
			<div class="row">
			
				<?php
					$this->widget('CMultiFileUpload', array(
						'name' => 'images',
						'accept' => 'jpeg|jpg|gif|png', 
						'duplicate' => 'Duplicate file', 
						'denied' => 'Invalid file type', 
					));
					
				?>
			</div>
			<div id="test"></div>

			<?php
			// $upload = new XUploadForm;
			$this->widget('xupload.XUpload', array(
			                    'url' => Yii::app()->createUrl("registration/upload"),
			                    'htmlOptions' => array('id'=>'topic-form'),
			                    'model' => $model,
			                    'attribute' => 'file',
			                    'multiple' => true,
			                     'showForm' => false,
			                     'options' => array(//Additional javascript options
				                //This is the submit callback that will gather
				                //the additional data  corresponding to the current file
				                'submit' => "js:function (e, data) {
				                    var inputs = data.context.find(':input');
				                    data.formData = inputs.serializeArray();
				                    return true;
				                }"
				            ),
			));
			?>



			<div class="row" style="float: left; clear: both;"> 

			 


			<div id="preview" class="previewImg"><img src="" id="prevImg"  class="required" style="display:none" /></div>

			</div>



			<div class="row buttons" style="float: left;clear: both;">
				<?php echo CHtml::submitButton('Submit',array('name'=>'btn')); ?>
			</div>
			
			<!-- <div style="float: left;clear: both;">

			
			<?php echo CHtml::link('View submitted images', array('site/show')); ?>
			</div> -->
<?php $this->endWidget($form); ?>
		</div>
