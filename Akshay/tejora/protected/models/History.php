<?php

/**
 * This is the model class for table "history".
 *
 * The followings are the available columns in table 'history':
 * @property integer $id
 * @property integer $candidate_number
 * @property string $first_name
 * @property string $last_name
 * @property integer $marital_status
 * @property integer $number_child
 * @property string $dob
 * @property string $aniversary_date
 * @property integer $child_id
 * @property integer $mobile_no
 * @property string $pan_number
 * @property string $address
 * @property string $other_address
 * @property string $profile_picture
 * @property string $action
 */
class History extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'history';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('candidate_number, first_name, last_name, number_child, dob, aniversary_date, child_id, mobile_no, pan_number, address', 'required'),
			array('id, candidate_number, marital_status, number_child, child_id, mobile_no', 'numerical', 'integerOnly'=>true),
			array('first_name, last_name', 'length', 'max'=>50),
			array('pan_number, action', 'length', 'max'=>20),
			array('address, other_address', 'length', 'max'=>60),
			array('profile_picture', 'length', 'max'=>255),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, candidate_number, first_name, last_name, marital_status, number_child, dob, aniversary_date, child_id, mobile_no, pan_number, address, other_address, profile_picture, action', 'safe', 'on'=>'search'),
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
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'candidate_number' => 'Candidate Number',
			'first_name' => 'First Name',
			'last_name' => 'Last Name',
			'marital_status' => 'Marital Status',
			'number_child' => 'Number Child',
			'dob' => 'Dob',
			'aniversary_date' => 'Aniversary Date',
			'child_id' => 'Child',
			'mobile_no' => 'Mobile No',
			'pan_number' => 'Pan Number',
			'address' => 'Address',
			'other_address' => 'Other Address',
			'profile_picture' => 'Profile Picture',
			'action' => 'Action',
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
		$criteria->compare('candidate_number',$this->candidate_number);
		$criteria->compare('first_name',$this->first_name,true);
		$criteria->compare('last_name',$this->last_name,true);
		$criteria->compare('marital_status',$this->marital_status);
		$criteria->compare('number_child',$this->number_child);
		$criteria->compare('dob',$this->dob,true);
		$criteria->compare('aniversary_date',$this->aniversary_date,true);
		$criteria->compare('child_id',$this->child_id);
		$criteria->compare('mobile_no',$this->mobile_no);
		$criteria->compare('pan_number',$this->pan_number,true);
		$criteria->compare('address',$this->address,true);
		$criteria->compare('other_address',$this->other_address,true);
		$criteria->compare('profile_picture',$this->profile_picture,true);
		$criteria->compare('action',$this->action,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return History the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	public function histmaintain($id){
		/*$vlist= Yii::app()->db->createCommand('select date from vendor where vtoken = "'.$vtoken.'"')->queryAll();
		return $vlist;*/

		$list = Yii::app()->db->createCommand('select id, first_name, last_name  from registration where id = "'.$id.'"')->queryAll();
		//print_r($list); exit();
		return $list;



	}
}
