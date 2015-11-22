<?php

/**
 * This is the model class for table "Meta".
 *
 * The followings are the available columns in table 'Meta':
 * @property integer $id
 * @property integer $post_id
 * @property string $meta_name
 * @property string $meta_text
 * @property string $meta_link
 * @property integer $meta_status
 */
class Meta extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'Meta';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('post_id, meta_name', 'required'),
			array('post_id, meta_status', 'numerical', 'integerOnly'=>true),
			array('meta_name, meta_text, meta_link', 'length', 'max'=>250),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, post_id, meta_name, meta_text, meta_link, meta_status', 'safe', 'on'=>'search'),
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
			'post_id' => 'Post',
			'meta_name' => 'Meta Name',
			'meta_text' => 'Meta Text',
			'meta_link' => 'Meta Link',
			'meta_status' => 'Meta Status',
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
		$criteria->compare('post_id',$this->post_id);
		$criteria->compare('meta_name',$this->meta_name,true);
		$criteria->compare('meta_text',$this->meta_text,true);
		$criteria->compare('meta_link',$this->meta_link,true);
		$criteria->compare('meta_status',$this->meta_status);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Meta the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
