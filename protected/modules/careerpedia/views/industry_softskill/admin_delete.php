<?php
	/* @var $this IndustrysoftskillController */
	/* @var $model CareerpediaIndustrySoftskill */

$this->breadcrumbs=array(
	'Careerpedia Industry Softskills'=>array('manage'),
	'Delete',
);
?>

<?php $form=$this->beginWidget('application.components.system.OActiveForm', array(
	'id'=>'careerpedia-industry-softskill-form',
	'enableAjaxValidation'=>true,
	//'htmlOptions' => array('enctype' => 'multipart/form-data')
)); ?>

	<div class="dialog-content">
		<?php echo Phrase::trans(172,0);?>
		
	</div>
	<div class="dialog-submit">
		<?php echo CHtml::submitButton(Phrase::trans(173,0), array('onclick' => 'setEnableSave()')); ?>
		<?php echo CHtml::button(Phrase::trans(174,0), array('id'=>'closed')); ?>
	</div>
	
<?php $this->endWidget(); ?>
