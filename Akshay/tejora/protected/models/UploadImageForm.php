<?php
   //namespace app\models;
   //use yii\base\Model;
   class UploadImageForm extends CFormModel {
      public $image;
 
   // Define rules for file uploads
   // In this example, we want images of size less than 1MB
    public function rules()
    {
        return array(
            array('image', 'file', 'allowEmpty' => true, 'safe' => true, 'types' => 'jpg, jpeg, gif, png')
        );
    }
   }
?>