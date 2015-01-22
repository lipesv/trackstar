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
// 						'value' => "" 
				),
				// 'value' => CHtml::encode ( IssueType::getTypeText ( $model ) )
				// array (
				// 'name' => 'status',
				// 'value' => CHtml::encode ( $this->loadModel ( $model->id )->getStatusText () )
				// ),
				'owner',
				'requester',
				
				array (
						'class' => 'CButtonColumn',
						'viewButtonUrl' => 'Yii::app()->createUrl("/issue/view", array("id" => $data->id, "pid"=>$data->project_id))',
						'deleteButtonUrl' => 'Yii::app()->createUrl("/issue/delete", array("id" => $data->id))',
						'updateButtonUrl' => 'Yii::app()->createUrl("/issue/update", array("id" => $data->id, "pid"=>$data->project_id))' 
				) 
		) 
) );
// 'buttons' => array (
// 'view' => array (
// "url" => "Yii::app()->createUrl('view', array('id'=>$model->id, 'pid'=>$model->project_id))"
// ),
// 'update' => array (
// "url" => "Yii::app()->createUrl('update', array('id'=>$model->id, 'pid'=>$model->project_id))"
// ),
// 'delete' => array (
// "url" => "Yii::app()->createUrl('delete', array('id'=>$model->id))"
// )
// )

?>
