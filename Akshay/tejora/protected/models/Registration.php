<?php

/**
 * This is the model class for table "registration".
 *
 * The followings are the available columns in table 'registration':
 * @property integer $id
 * @property integer $candidate_number
 * @property string $first_name
 * @property string $last_name
 * @property integer $marital_status
 * @property integer $number_child
 * @property string $dob
 * @property string $aniversary_date
 * @property integer $fchilddob
 * @property integer $mobile_no
 * @property string $pan_number
 * @property string $address
 * @property string $other_address
 * @property string $profile_picture
 */
class Registration extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'registration';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('first_name, last_name, dob, mobile_no, pan_number, address', 'required'),
			array('candidate_number, marital_status, number_child, mobile_no', 'numerical', 'integerOnly'=>true),
			array('first_name, last_name', 'length', 'max'=>50),
			array('pan_number', 'length', 'max'=>20),
			array('address, other_address', 'length', 'max'=>60),
			//array('profile_picture', 'file', 'types'=>'jpeg, gif, png', 'safe' => false),
			array('profile_picture', 'length', 'max'=>255),

			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, candidate_number, first_name, last_name, marital_status, number_child, dob, aniversary_date, fchilddob, mobile_no, pan_number, address, other_address, profile_picture', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{

  return array(
            'qualification'=>array(self::HAS_MANY, 'Qualification', 'registration_id'),
            'skill'=>array(self::HAS_MANY, 'Skill', 'registration_id'),
            'scandocument'=>array(self::HAS_MANY, 'ScanDocument', 'registration_id'),
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
			'fchilddob' => 'Date of Birth of 1st child',
			'mobile_no' => 'Mobile No',
			'pan_number' => 'Pan Number',
			'address' => 'Address',
			'other_address' => 'Other Address',
			'profile_picture' => 'Profile Picture',
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
		$criteria->compare('fchilddob',$this->fchilddob);
		$criteria->compare('mobile_no',$this->mobile_no);
		$criteria->compare('pan_number',$this->pan_number,true);
		$criteria->compare('address',$this->address,true);
		$criteria->compare('other_address',$this->other_address,true);
		$criteria->compare('profile_picture',$this->profile_picture,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}


	
 public function behaviors()
    {
        return array('ESaveRelatedBehavior' => array(
                'class' => 'application.components.ESaveRelatedBehavior')
        );
    }
	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Registration the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	public function changeStatus($userId){
		//print_r($userId); exit();
		$user=Yii::app()->db->createCommand()->update('registration', array(
	    'status'=>1), 'id=:id', array(':id'=>$userId));
	    //print_r($user); exit();
	    return $user;
	}

	public function rejctMker($userId){
		//print_r($userId); exit();
		$user=Yii::app()->db->createCommand()->update('registration', array(
	    'status'=>2), 'id=:id', array(':id'=>$userId));
	    //print_r($user); exit();
	    return $user;
	}

	public function UpdatecanNum($canNum, $userId){
		//print_r($canNum.' dasd'); exit();
		$user=Yii::app()->db->createCommand()->update('registration', array(
	    'candidate_number'=>$canNum), 'id=:id', array(':id'=>$userId));
	    //print_r($user); exit();
	    return $user;
	}

	public function getAll(){

		//$list= Yii::app()->db->createCommand('select role from user where username = "'.$check_role.'"')->queryAll();

		/*$list = Yii::app()->db->createCommand('select username, email, contact, address, date, mail_status, role from user where role = "Vendor"')->queryAll();
		return $list;*/

		$list = Yii::app()->db->createCommand('select candidate_number, first_name, last_name, marital_status,number_child,dob,
			aniversary_date,fchilddob,mobile_no, address,other_address,profile_picture,status from registration')->queryAll();

		return $list;
	
	}


	public function deleteImg(){
		
	}





	
}
