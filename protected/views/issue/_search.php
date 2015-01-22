<?php
/* @var $this IssueController */
/* @var $model IssueManage */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php

$form = $this->beginWidget ( 'CActiveForm', array (
		'action' => Yii::app ()->createUrl ( $this->route ),
		'method' => 'get' 
) );
?>

	<div class="row">
		<?php //echo $form->label($model,'id'); ?>
		<?php //echo $form->textField($model,'id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'issue'); ?>
		<?php echo $form->textField($model,'issue',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'description'); ?>
		<?php echo $form->textArea($model,'description',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'project'); ?>
		<?php echo $form->textField($model,'project'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'type'); ?>
		<?php echo $form->dropDownList ( $model, 'type', IssueType::getValidValues () ); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'status'); ?>
		<?php echo $form->dropDownList($model, 'status', IssueStatus::getValidValues () ); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'requester_id');  ?>
		<?php echo $form->dropDownList($model, 'requester_id', $this->loadProject($model->project_id)->getUserOptions()); //echo $form->textField($model,'requester'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'owner_id'); ?>
		<?php echo $form->dropDownList($model, 'owner_id', $this->loadProject($model->project_id)->getUserOptions()); //echo $form->textField($model,'owner'); ?>
	</div>

	<div class="row">
		<?php //echo $form->label($model,'create_time'); ?>
		<?php //echo $form->textField($model,'create_time'); ?>
	</div>

	<div class="row">
		<?php //echo $form->label($model,'create_user_id'); ?>
		<?php //echo $form->textField($model,'create_user_id'); ?>
	</div>

	<div class="row">
		<?php //echo $form->label($model,'update_time'); ?>
		<?php //echo $form->textField($model,'update_time'); ?>
	</div>

	<div class="row">
		<?php //echo $form->label($model,'update_user_id'); ?>
		<?php //echo $form->textField($model,'update_user_id'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div>
<!-- search-form -->