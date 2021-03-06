<?php
Yii::import ( "application.models.enums.*" );

/**
 * This is the model class for table "vw_issue_manage".
 *
 * The followings are the available columns in table 'vw_issue_manage':
 *
 * @property integer $id
 * @property string $issue
 * @property string $description
 * @property integer $project_id
 * @property string $project
 * @property string $type_id
 * @property string $status_id
 * @property integer $requester_id
 * @property string $requester
 * @property integer $owner_id
 * @property string $owner
 */
class IssueManage extends CActiveRecord {
	/**
	 *
	 * @return string the associated database table name
	 */
	public function tableName() {
		return 'vw_issue_manage';
	}
	
	/**
	 *
	 * @return array validation rules for model attributes.
	 */
	public function rules() {
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array (
				array (
						'issue, project, requester, owner',
						'required' 
				),
				array (
						'id, project_id, requester_id, owner_id',
						'numerical',
						'integerOnly' => true 
				),
				array (
						'issue, project, requester, owner',
						'length',
						'max' => 255 
				),
				array (
						'type_id, status_id',
						'length',
						'max' => 11 
				),
				array (
						'description',
						'safe' 
				),
				// The following rule is used by search().
				// @todo Please remove those attributes that should not be searched.
				array (
						'issue, description, project_id, project, type_id, status_id, requester_id, requester, owner_id, owner',
						'safe',
						'on' => 'search' 
				) 
		);
	}
	
	/**
	 *
	 * @return array relational rules.
	 */
	public function relations() {
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array ();
	}
	
	/**
	 *
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels() {
		return array (
				'id' => 'ID',
				'issue' => 'Issue',
				'description' => 'Description',
				'project_id' => 'Project',
				'project' => 'Project',
				'type_id' => 'Type',
				'status_id' => 'Status',
				'requester_id' => 'Requester',
				'requester' => 'Requester',
				'owner_id' => 'Owner',
				'owner' => 'Owner' 
		);
	}
	
	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 *
	 * Typical usecase:
	 * - Initialize the model fields with values from filter form.
	 * - Execute this method to get CActiveDataProvider instance which will filter
	 * models according to data in model fields.
	 * - Pass data provider to CGridView, CListView or any similar widget.
	 *
	 * @return CActiveDataProvider the data provider that can return the models
	 *         based on the search/filter conditions.
	 */
	public function search() {
		// @todo Please modify the following code to remove attributes that should not be searched.
		$criteria = new CDbCriteria ();
		
		$criteria->compare ( 'id', $this->id );
		$criteria->compare ( 'issue', $this->issue, true );
		$criteria->compare ( 'description', $this->description, true );
		$criteria->compare ( 'project_id', $this->project_id );
		$criteria->compare ( 'project', $this->project, true );
		$criteria->compare ( 'type_id', $this->type_id, true );
		$criteria->compare ( 'status_id', $this->status_id, true );
		$criteria->compare ( 'requester_id', $this->requester_id );
		$criteria->compare ( 'requester', $this->requester, true );
		$criteria->compare ( 'owner_id', $this->owner_id );
		$criteria->compare ( 'owner', $this->owner, true );
		
		return new CActiveDataProvider ( $this, array (
				'criteria' => $criteria 
		) );
	}
	
	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 *
	 * @param string $className
	 *        	active record class name.
	 * @return IssueManage the static model class
	 */
	public static function model($className = __CLASS__) {
		return parent::model ( $className );
	}
}
