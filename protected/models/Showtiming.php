<?php

/**
 * This is the model class for table "showtiming".
 *
 * The followings are the available columns in table 'showtiming':
 * @property integer $id
 * @property string $movies_name
 * @property string $showtime_day
 * @property string $showdateetime
 * @property integer $movie_id
 * @property integer $location_id
 *
 * The followings are the available model relations:
 * @property Locations $location
 * @property Addmovie $movie
 */
class Showtiming extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'showtiming';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('movie_id, location_id', 'numerical', 'integerOnly'=>true),
			array('movies_name', 'length', 'max'=>1000),
			array('showtime_day', 'length', 'max'=>100),
			array('showdateetime', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, movies_name, showtime_day, showdateetime, movie_id, location_id', 'safe', 'on'=>'search'),
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
			'location' => array(self::BELONGS_TO, 'Locations', 'location_id'),
			'movie' => array(self::BELONGS_TO, 'Addmovie', 'movie_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'movies_name' => 'Movies Name',
			'showtime_day' => 'Showtime Day',
			'showdateetime' => 'Showdateetime',
			'movie_id' => 'Movie',
			'location_id' => 'Location',
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
		$criteria->compare('movies_name',$this->movies_name,true);
		$criteria->compare('showtime_day',$this->showtime_day,true);
		$criteria->compare('showdateetime',$this->showdateetime,true);
		$criteria->compare('movie_id',$this->movie_id);
		$criteria->compare('location_id',$this->location_id);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Showtiming the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
