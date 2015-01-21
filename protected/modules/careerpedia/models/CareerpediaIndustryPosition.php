<?php

/**
 * This is the model class for table "ommu_careerpedia_industry_position".
 *
 * The followings are the available columns in table 'ommu_careerpedia_industry_position':
 * @property string $id
 * @property string $industry_id
 * @property string $position_id
 * @property integer $priority
 *
 * The followings are the available model relations:
 * @property OmmuCareerpediaIndustrys $industry
 * @property OmmuCareerpediaPositions $position
 */
class CareerpediaIndustryPosition extends CActiveRecord
{
	public $defaultColumns = array();

	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return CareerpediaIndustryPosition the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'ommu_careerpedia_industry_position';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('industry_id, position_id, priority', 'required'),
			array('priority', 'numerical', 'integerOnly'=>true),
			array('industry_id, position_id', 'length', 'max'=>11),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, industry_id, position_id, priority', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
			'industry' => array(self::BELONGS_TO, 'CareerpediaIndustrys', 'industry_id'),
			'position' => array(self::BELONGS_TO, 'CareerpediaPositions', 'position_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'industry_id' => 'Industry',
			'position_id' => 'Position',
			'priority' => 'Priority',
		);
	}
	
	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('t.id',$this->id,true);
		$criteria->compare('t.industry_id',$this->industry_id,true);
		$criteria->compare('t.position_id',$this->position_id,true);
		$criteria->compare('t.priority',$this->priority);

		if(!isset($_GET['CareerpediaIndustryPosition_sort']))
			$criteria->order = 'id DESC';

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
			'pagination'=>array(
				'pageSize'=>30,
			),
		));
	}


	/**
	 * Get column for CGrid View
	 */
	public function getGridColumn($columns=null) {
		if($columns !== null) {
			foreach($columns as $val) {
				/*
				if(trim($val) == 'enabled') {
					$this->defaultColumns[] = array(
						'name'  => 'enabled',
						'value' => '$data->enabled == 1? "Ya": "Tidak"',
					);
				}
				*/
				$this->defaultColumns[] = $val;
			}
		}else {
			//$this->defaultColumns[] = 'id';
			$this->defaultColumns[] = 'industry_id';
			$this->defaultColumns[] = 'position_id';
			$this->defaultColumns[] = 'priority';
		}

		return $this->defaultColumns;
	}

	/**
	 * Set default columns to display
	 */
	protected function afterConstruct() {
		if(count($this->defaultColumns) == 0) {
			$this->defaultColumns[] = array(
				'header' => 'No',
				'value' => '$this->grid->dataProvider->pagination->currentPage*$this->grid->dataProvider->pagination->pageSize + $row+1'
			);
			$this->defaultColumns[] = 'industry_id';
			$this->defaultColumns[] = 'position_id';
			$this->defaultColumns[] = 'priority';

		}
		parent::afterConstruct();
	}

}