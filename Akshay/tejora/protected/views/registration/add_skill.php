	<div style="display: <?php echo!empty($display) ? $display : 'none'; ?>; width:100%; clear:left;" class="crow">

    

    <div class="row" style="width:71px;float: left;">
        <?php echo CHtml::activeLabelEx($model, '[' . $index . ']skill'); ?>
        <?php echo CHtml::activeTextField($model, '[' . $index . ']skill'); ?>
        <?php echo CHtml::error($model, '[' . $index . ']skill'); ?>
    </div>
     <div class="row" style="width:100px;float: left; overflow: hidden;">
        <?php echo CHtml::activeLabelEx($model, '[' . $index . ']proficiency'); ?>
        <?php echo CHtml::activeTextField($model, '[' . $index . ']proficiency'); ?>
        <?php echo CHtml::error($model, '[' . $index . ']proficiency'); ?>
    </div>
     
    <div class="row" style="width:50px;float: right; margin-left:30px; margin-top: 9px;">
        <br />
        <?php echo CHtml::link('Delete', '#', array('onclick' => 'deleteSkill(this, ' . $index . '); return false;'));
        ?>
    </div>
</div>

<?php //$this->endWidget(); ?>

</div><!-- form -->