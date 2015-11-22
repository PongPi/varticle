<?php

/**
 * This is the model class for table "Posts".
 *
 * The followings are the available columns in table 'Posts':
 * @property integer $id
 * @property integer $account_id
 * @property string $post_date
 * @property string $post_title
 * @property string $post_img
 * @property string $post_desc
 * @property string $post_content
 * @property integer $post_status
 * @property integer $post_cat
 * @property string $post_type
 *
 * The followings are the available model relations:
 * @property Activities[] $activities
 * @property Accounts $account
 * @property Catalogue $postCat
 */
class Posts extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'Posts';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('post_img, post_desc', 'required'),
			array('account_id, post_status, post_cat', 'numerical', 'integerOnly'=>true),
			array('post_title', 'length', 'max'=>250),
			array('post_img', 'length', 'max'=>255),
			array('post_type', 'length', 'max'=>20),
			array('post_date, post_content', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, account_id, post_date, post_title, post_img, post_desc, post_content, post_status, post_cat, post_type', 'safe', 'on'=>'search'),
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
			'activities' => array(self::HAS_MANY, 'Activities', 'post_id'),
			'account' => array(self::BELONGS_TO, 'Accounts', 'account_id'),
			'postCat' => array(self::BELONGS_TO, 'Catalogue', 'post_cat'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'account_id' => 'Account',
			'post_date' => 'Post Date',
			'post_title' => 'Post Title',
			'post_img' => 'Post Img',
			'post_desc' => 'Post Desc',
			'post_content' => 'Post Content',
			'post_status' => 'Post Status',
			'post_cat' => 'Post Cat',
			'post_type' => 'Post Type',
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
		$criteria->compare('account_id',$this->account_id);
		$criteria->compare('post_date',$this->post_date,true);
		$criteria->compare('post_title',$this->post_title,true);
		$criteria->compare('post_img',$this->post_img,true);
		$criteria->compare('post_desc',$this->post_desc,true);
		$criteria->compare('post_content',$this->post_content,true);
		$criteria->compare('post_status',$this->post_status);
		$criteria->compare('post_cat',$this->post_cat);
		$criteria->compare('post_type',$this->post_type,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Posts the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
