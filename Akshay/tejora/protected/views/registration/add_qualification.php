<div style="margin-bottom: 20px; display: <?php echo!empty($display) ? $display : 'none'; ?>; width:100%; clear:left;" class="crow">
 
    <div class="row" style="width:80px;float: left;">
        <?php echo CHtml::activeLabelEx($model, '[' . $index . ']type'); ?>
        <?php echo CHtml::activeTextField($model, '[' . $index . ']type', array('size' => 20, 'maxlength' => 255)); ?>
        <?php echo CHtml::error($model, '[' . $index . ']type'); ?>
    </div>
 
    <div class="row" style="width:80px;float: left;">
        <?php echo CHtml::activeLabelEx($model, '[' . $index . ']university'); ?>
        <?php echo CHtml::activeTextField($model, '[' . $index . ']university'); ?>
        <?php echo CHtml::error($model, '[' . $index . ']university'); ?>
    </div>
    <div class="row" style="width:80px;float: left;">
        <?php echo CHtml::activeLabelEx($model, '[' . $index . ']percentage'); ?>
        <?php echo CHtml::activeTextField($model, '[' . $index . ']percentage'); ?>
        <?php echo CHtml::error($model, '[' . $index . ']percentage'); ?>
    </div>
    <div class="row" style="width:80px;float: left;">
        <?php echo CHtml::activeLabelEx($model, '[' . $index . ']passing_year'); ?>
        <?php echo CHtml::activeTextField($model, '[' . $index . ']passing_year'); ?>
        <?php echo CHtml::error($model, '[' . $index . ']passing_year'); ?>
    </div>
    <div class="row" style="width:80px;float: left; overflow: hidden;">
        <?php echo CHtml::activeLabelEx($model, '[' . $index . ']class'); ?>
        <?php echo CHtml::activeTextField($model, '[' . $index . ']class'); ?>
        <?php echo CHtml::error($model, '[' . $index . ']class'); ?>
    </div>
    <div class="row" style="width:100px;float: left; margin-left:30px; margin-top: 9px;">
        <br />
        <?php echo CHtml::link('Delete', '#', array('onclick' => 'deleteChild(this, ' . $index . '); return false;'));
        ?>
    </div>
</div>
 
<?php
// Yii::app()->clientScript->registerScript('deleteChild', "
// function deleteChild(elm, index)
// {
//     element=$(elm).parent().parent();
//     /* animate div */
//     $(element).animate(
//     {
//         opacity: 0.25, 
//         left: '+=50', 
//         height: 'toggle'
//     }, 500,
//     function() {
//         /* remove div */
//         $(element).remove();
//     });
// }", CClientScript::POS_END);