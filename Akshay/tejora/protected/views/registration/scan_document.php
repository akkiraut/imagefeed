	<div style="display: <?php echo!empty($display) ? $display : 'none'; ?>; width:100%; clear:left;" class="crow">


	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php //echo $form->errorSummary($model); ?>


 <div class="row" style="width:100px;float: left;">
        <?php echo CHtml::activeLabelEx($model, 'name'); ?>
        <?php echo CHtml::activeTextField($model, 'name'); ?>
        <?php echo CHtml::error($model, 'name'); ?>
    </div>
     <div class="row" style="width:100px;float: left;">
        <?php echo CHtml::activeLabelEx($model, 'upload_filename'); ?>
        <?php echo CHtml::activeTextField($model, 'upload_filename'); ?>
        <?php echo CHtml::error($model, 'upload_filename'); ?>
    </div>






<?php //$this->endWidget(); ?>

</div><!-- form -->