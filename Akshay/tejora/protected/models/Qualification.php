<?php

/**
 * This is the model class for table "qualification".
 *
 * The followings are the available columns in table 'qualification':
 * @property integer $id
 * @property string $type
 * @property string $university
 * @property string $percentage
 * @property string $passing_year
 * @property string $class
 * @property integer $registration_id
 */
class Qualification extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */

	
	public function tableName()
	{
		return 'qualification';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('registration_id', 'numerical', 'integerOnly'=>true),
			array('type', 'length', 'max'=>60),
			array('university', 'length', 'max'=>100),
			array('percentage', 'length', 'max'=>50),
			array('passing_year', 'length', 'max'=>10),
			array('class', 'length', 'max'=>30),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, type, university, percentage, passing_year, class, registration_id', 'safe', 'on'=>'search'),
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
            'registration' => array(self::BELONGS_TO, 'Registration', 'registration_id'),
        );
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'type' => 'Type',
			'university' => 'University',
			'percentage' => 'Percentage',
			'passing_year' => 'Passing Year',
			'class' => 'Class',
			'registration_id' => 'Registration',
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
	 * based on the search/filter conditions.
	 */
	public function search()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id);
		$criteria->compare('type',$this->type,true);
		$criteria->compare('university',$this->university,true);
		$criteria->compare('percentage',$this->percentage,true);
		$criteria->compare('passing_year',$this->passing_year,true);
		$criteria->compare('class',$this->class,true);
		$criteria->compare('registration_id',$this->registration_id);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Qualification the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
