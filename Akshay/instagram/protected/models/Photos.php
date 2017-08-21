<?php

/**
 * This is the model class for table "photos".
 *
 * The followings are the available columns in table 'photos':
 * @property integer $id
 * @property integer $user_id
 * @property integer $event_id
 * @property string $name
 * @property string $hash_name
 * @property string $size
 * @property string $type
 * @property string $created
 * @property integer $status
 * @property string $title
 * @property integer $cover_pic
 */
class Photos extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'photos';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('user_id, event_id, status, cover_pic', 'numerical', 'integerOnly'=>true),
			array('name, hash_name', 'length', 'max'=>255),
			array('size', 'length', 'max'=>50),
			array('type', 'length', 'max'=>15),
			array('title', 'length', 'max'=>100),
			array('created', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, user_id, event_id, name, hash_name, size, type, created, status, title, cover_pic', 'safe', 'on'=>'search'),
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
			'user_id' => 'User',
			'event_id' => 'Event',
			'name' => 'Name',
			'hash_name' => 'Hash Name',
			'size' => 'Size',
			'type' => 'Type',
			'created' => 'Created',
			'status' => 'Status',
			'title' => 'Title',
			'cover_pic' => 'Cover Pic',
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
		$criteria->compare('user_id',$this->user_id);
		$criteria->compare('event_id',$this->event_id);
		$criteria->compare('name',$this->name,true);
		$criteria->compare('hash_name',$this->hash_name,true);
		$criteria->compare('size',$this->size,true);
		$criteria->compare('type',$this->type,true);
		$criteria->compare('created',$this->created,true);
		$criteria->compare('status',$this->status);
		$criteria->compare('title',$this->title,true);
		$criteria->compare('cover_pic',$this->cover_pic);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Photos the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	public function afterSave( ) {
	    $this->addImages( );
	    parent::afterSave( );
	}
	 
	public function addImages( ) {
	    //If we have pending images
	    if( Yii::app( )->user->hasState( 'images' ) ) {
	        $userImages = Yii::app( )->user->getState( 'images' );
	        //print_r($userImages); exit();
	        //Resolve the final path for our images
	        $path = Yii::app( )->getBasePath( )."/../images/uploads/";
	        //Create the folder and give permissions if it doesnt exists
	        if( !is_dir( $path ) ) {
	            mkdir( $path );
	            chmod( $path, 0777 );
	        }
	 
	        //Now lets create the corresponding models and move the files
	        foreach( $userImages as $image ) {
	            if( is_file( $image["path"] ) ) {
	                if( rename( $image["path"], $path.$image["filename"] ) ) {
	                    chmod( $path.$image["filename"], 0777 );
	                    $img = new Photos( );
	                    $img->size = $image["size"];
	                    $img->type = $image["mime"];
	                    $img->name = $image["name"];
	                    $img->cover_pic = $image["cover_pic"];
	                    

	                    /*$img->source = "/images/uploads/{$this->id}/".$image["filename"];*/
	                    $img->user_id = $this->id;
	                    if( !$img->save( ) ) {
	                        //Its always good to log something
	                        Yii::log( "Could not save Image:\n".CVarDumper::dumpAsString( 
	                            $img->getErrors( ) ), CLogger::LEVEL_ERROR );
	                        //this exception will rollback the transaction
	                        throw new Exception( 'Could not save Image');
	                    }
	                }
	            } else {
	                //You can also throw an execption here to rollback the transaction
	                Yii::log( $image["path"]." is not a file", CLogger::LEVEL_WARNING );
	            }
	        }
	        //Clear the user's session
	        Yii::app( )->user->setState( 'images', null );
	    }
	}
	
}
