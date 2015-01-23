<?php
/* @var $this IssueController */
/* @var $model IssueManage */
$this->breadcrumbs = array (
		'Issues' => array (
				'index',
				'pid' => $model->project_id 
		),
		'Manage' 
);

$this->menu = array (
		array (
				'label' => 'List Issue',
				'url' => array (
						'index',
						'pid' => $model->project_id 
				) 
		),
		array (
				'label' => 'Create Issue',
				'url' => array (
						'create',
						'pid' => $model->project_id 
				) 
		) 
);

Yii::app ()->clientScript->registerScript ( 'search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#issue-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
" );
?>

<h1>Manage Issues</h1>

<p>
	You may optionally enter a comparison operator (<b>&lt;</b>, <b>&lt;=</b>,
	<b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b> or <b>=</b>) at the
	beginning of each of your search values to specify how the comparison
	should be done.
</p>

<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display: none">
<?php

$this->renderPartial ( '_search', array (
		'model' => $model 
) );
?>
</div>
<!-- search-form -->

<?php

$this->widget ( 'zii.widgets.grid.CGridView', array (
		'id' => 'issue-grid',
		'dataProvider' => $model->search (),
		'filter' => $model,
		'columns' => array (
				'issue',
				'description',
				'project',
				array (
						'name' => 'type_id',
						'value' => 'IssueType::getTypeText ( $data )',
						'filter' => CHtml::dropDownList ( 'IssueManage[type_id]', $model->type_id, IssueType::getValidValues (), array (
								'style' => 'width:110px;',
								'prompt' => '' 
						) ) 
				),
				array (
						'name' => 'status_id',
						'value' => 'IssueStatus::getStatusText ( $data )',
						'filter' => CHtml::dropDownList ( 'IssueManage[status_id]', $model->status_id, IssueStatus::getValidValues (), array (
								'style' => 'width:120px;',
								'prompt' => '' 
						) ) 
				),
				array (
						'name' => 'requester_id',
						'value' => '$data->requester',
						'filter' => CHtml::listData ( $this->loadProject ( $model->project_id )->users, "id", "username" ) 
				),
				array (
						'name' => 'owner_id',
						'value' => '$data->owner',
						'filter' => CHtml::listData ( $this->loadProject ( $model->project_id )->users, "id", "username" ) 
				),
				array (
						'class' => 'CButtonColumn',
						'viewButtonUrl' => 'Yii::app()->createUrl("/issue/view", array("id" => $data->id, "pid"=>$data->project_id))',
						'deleteButtonUrl' => 'Yii::app()->createUrl("/issue/delete", array("id" => $data->id))',
						'updateButtonUrl' => 'Yii::app()->createUrl("/issue/update", array("id" => $data->id, "pid"=>$data->project_id))' 
				) 
		) 
) );

?>
