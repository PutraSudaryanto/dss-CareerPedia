<?php
	/* @var $this MajorgroupController */
	/* @var $model CareerpediaMajorGroup */

	$this->breadcrumbs=array(
		'Careerpedia Major Groups'=>array('manage'),
		'Manage',
	);
?>

<div id="partial-careerpedia-major-group">
	<?php //begin.Messages ?>
	<div id="ajax-message">
	<?php
		if(Yii::app()->user->hasFlash('error'))
			echo Utility::flashError(Yii::app()->user->getFlash('error'));
		if(Yii::app()->user->hasFlash('success'))
			echo Utility::flashSuccess(Yii::app()->user->getFlash('success'));
	?>
	</div>
	<?php //begin.Messages ?>

	<div class="boxed">
		<?php //begin.Grid Item ?>
		<?php 
			$columnData   = $columns;
			array_push($columnData, array(
				'header' => Phrase::trans(151,0),
				'class'=>'CButtonColumn',
				'buttons' => array(
					'view' => array(
						'label' => 'view',
						'options' => array(							
							'class' => 'view',
							'off_address' => '',
							'target' => '_blank',
						),
						'url' => 'Yii::app()->controller->createUrl("site/view",array("id"=>$data->primaryKey))'),
					'update' => array(
						'label' => 'update',
						'options' => array(
							'class' => 'update'
						),
						'url' => 'Yii::app()->controller->createUrl("edit",array("id"=>$data->primaryKey))'),
					'delete' => array(
						'label' => 'delete',
						'options' => array(
							'class' => 'delete'
						),
						'url' => 'Yii::app()->controller->createUrl("delete",array("id"=>$data->primaryKey))')
				),
				'template' => '{update}|{delete}',
			));

			$this->widget('application.components.system.OGridView', array(
				'id'=>'careerpedia-major-group-grid',
				'dataProvider'=>$model->search(),
				'filter'=>$model,
				'columns' => $columnData,
				'pager' => array('header' => ''),
			));
		?>
		<?php //end.Grid Item ?>
	</div>
</div>