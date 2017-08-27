<?php

/**
 * This is the model class for table "addmovie".
 *
 * The followings are the available columns in table 'addmovie':
 * @property integer $id
 * @property string $movie_name
 * @property string $movie_desc
 * @property string $movie_type
 * @property string $rating
 * @property string $slider_img_path
 * @property string $movie_img_path
 * @property integer $status
 * @property string $timestamp
 * @property string $sliderorder
 *
 * The followings are the available model relations:
 * @property Showtiming[] $showtimings
 */
class Addmovie extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'addmovie';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('status', 'numerical', 'integerOnly'=>true),
			array('movie_name, rating', 'length', 'max'=>100),
			array('movie_desc', 'length', 'max'=>1000),
			array('movie_type', 'length', 'max'=>20),
			array('slider_img_path, movie_img_path', 'length', 'max'=>200),
			array('sliderorder', 'length', 'max'=>15),
			array('timestamp', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, movie_name, movie_desc, movie_type, rating, slider_img_path, movie_img_path, status, timestamp, sliderorder', 'safe', 'on'=>'search'),
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
			'showtimings' => array(self::HAS_MANY, 'Showtiming', 'movie_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'movie_name' => 'Movie Name',
			'movie_desc' => 'Movie Desc',
			'movie_type' => 'Movie Type',
			'rating' => 'Rating',
			'slider_img_path' => 'Slider Img Path',
			'movie_img_path' => 'Movie Img Path',
			'status' => 'Status',
			'timestamp' => 'Timestamp',
			'sliderorder' => 'Sliderorder',
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
		$criteria->compare('movie_name',$this->movie_name,true);
		$criteria->compare('movie_desc',$this->movie_desc,true);
		$criteria->compare('movie_type',$this->movie_type,true);
		$criteria->compare('rating',$this->rating,true);
		$criteria->compare('slider_img_path',$this->slider_img_path,true);
		$criteria->compare('movie_img_path',$this->movie_img_path,true);
		$criteria->compare('status',$this->status);
		$criteria->compare('timestamp',$this->timestamp,true);
		$criteria->compare('sliderorder',$this->sliderorder,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Addmovie the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
