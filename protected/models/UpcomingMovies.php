<?php

/**
 * This is the model class for table "upcoming_movies".
 *
 * The followings are the available columns in table 'upcoming_movies':
 * @property integer $id
 * @property string $movie_title
 * @property string $external_url
 * @property string $timestamp
 * @property string $img_url
 */
class UpcomingMovies extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'upcoming_movies';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('movie_title, external_url, img_url', 'length', 'max'=>100),
			array('timestamp', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, movie_title, external_url, timestamp, img_url', 'safe', 'on'=>'search'),
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
			'movie_title' => 'Movie Title',
			'external_url' => 'External Url',
			'timestamp' => 'Timestamp',
			'img_url' => 'Img Url',
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
		$criteria->compare('movie_title',$this->movie_title,true);
		$criteria->compare('external_url',$this->external_url,true);
		$criteria->compare('timestamp',$this->timestamp,true);
		$criteria->compare('img_url',$this->img_url,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return UpcomingMovies the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
