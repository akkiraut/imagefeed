<div class="form">
			<?php
				$form=$this->beginWidget('CActiveForm', array(
					'id'=>'topic-form',
					/*'name'=>'topic-form',*/
					'enableAjaxValidation'=>true,
					'htmlOptions' => array('enctype' => 'multipart/form-data'),
					
				));
			?>
<?php
			// $upload = new XUploadForm;
			$this->widget('xupload.XUpload', array(
			                    'url' => Yii::app()->createUrl("users/upload"),
			                    'htmlOptions' => array('id'=>'topic-form'),
			                    'model' => $photos,
			                    'attribute' => 'file',
			                    'multiple' => true,
			                    'showForm' => false,
			                    'uploadView' => 'application.views.users._form',
			                    'downloadView' => 'application.views.users.download',
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

			<?php $this->endWidget($form); ?>
		</div>