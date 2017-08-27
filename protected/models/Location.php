<?php

/**
 * This is the model class for table "dbo.Location".
 *
 * The followings are the available columns in table 'dbo.Location':
 * @property integer $Location_OID
 * @property string $Location_Name
 * @property string $Description
 * @property string $Street
 * @property string $City
 * @property string $State
 * @property string $ZipCode
 * @property string $Create_By
 * @property string $Create_Date
 * @property string $Modify_By
 * @property string $Modify_Date
 * @property string $Active_f
 * @property string $Country
 * @property integer $Currency_OID
 * @property string $Continent
 * @property integer $State_OID
 * @property integer $TimeZoneOID
 * @property string $LocationCode
 * @property boolean $Department_f
 * @property string $UltiProBatchID
 * @property integer $City_OID
 * @property string $ProductionLocationCode
 * @property string $Email
 *
 * The followings are the available model relations:
 * @property LocationRate[] $locationRates
 * @property ChartOfAccount[] $chartOfAccounts
 * @property Employee[] $employees
 * @property PublicHoliday[] $publicHolidays
 * @property LegalEntityLocation[] $legalEntityLocations
 */
class Location extends AltActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function __construct()
	{
		self::setModelConnection(Yii::app()->db2);
	}
	public function tableName()
	{
		return 'dbo.Location';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('Location_Name', 'required'),
			array('Currency_OID, State_OID, TimeZoneOID, City_OID', 'numerical', 'integerOnly'=>true),
			array('Location_Name, City, Create_By, Modify_By, Country, Continent, Email', 'length', 'max'=>100),
			array('Description, Street', 'length', 'max'=>500),
			array('State, ProductionLocationCode', 'length', 'max'=>2),
			array('ZipCode', 'length', 'max'=>10),
			array('Active_f', 'length', 'max'=>1),
			array('LocationCode', 'length', 'max'=>3),
			array('UltiProBatchID', 'length', 'max'=>20),
			array('Create_Date, Modify_Date, Department_f', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('Location_OID, Location_Name, Description, Street, City, State, ZipCode, Create_By, Create_Date, Modify_By, Modify_Date, Active_f, Country, Currency_OID, Continent, State_OID, TimeZoneOID, LocationCode, Department_f, UltiProBatchID, City_OID, ProductionLocationCode, Email', 'safe', 'on'=>'search'),
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
			'locationRates' => array(self::HAS_MANY, 'LocationRate', 'Location_OID'),
			'chartOfAccounts' => array(self::HAS_MANY, 'ChartOfAccount', 'Location_OID'),
			'employees' => array(self::HAS_MANY, 'Employee', 'Location_OID'),
			'publicHolidays' => array(self::HAS_MANY, 'PublicHoliday', 'Location_OID'),
			'legalEntityLocations' => array(self::HAS_MANY, 'LegalEntityLocation', 'Location_OID'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'Location_OID' => 'Location Oid',
			'Location_Name' => 'Location Name',
			'Description' => 'Description',
			'Street' => 'Street',
			'City' => 'City',
			'State' => 'State',
			'ZipCode' => 'Zip Code',
			'Create_By' => 'Create By',
			'Create_Date' => 'Create Date',
			'Modify_By' => 'Modify By',
			'Modify_Date' => 'Modify Date',
			'Active_f' => 'Active F',
			'Country' => 'Country',
			'Currency_OID' => 'Currency Oid',
			'Continent' => 'Continent',
			'State_OID' => 'State Oid',
			'TimeZoneOID' => 'Time Zone Oid',
			'LocationCode' => 'Location Code',
			'Department_f' => 'Department F',
			'UltiProBatchID' => 'Ulti Pro Batch',
			'City_OID' => 'City Oid',
			'ProductionLocationCode' => 'Production Location Code',
			'Email' => 'Email',
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

		$criteria->compare('Location_OID',$this->Location_OID);
		$criteria->compare('Location_Name',$this->Location_Name,true);
		$criteria->compare('Description',$this->Description,true);
		$criteria->compare('Street',$this->Street,true);
		$criteria->compare('City',$this->City,true);
		$criteria->compare('State',$this->State,true);
		$criteria->compare('ZipCode',$this->ZipCode,true);
		$criteria->compare('Create_By',$this->Create_By,true);
		$criteria->compare('Create_Date',$this->Create_Date,true);
		$criteria->compare('Modify_By',$this->Modify_By,true);
		$criteria->compare('Modify_Date',$this->Modify_Date,true);
		$criteria->compare('Active_f',$this->Active_f,true);
		$criteria->compare('Country',$this->Country,true);
		$criteria->compare('Currency_OID',$this->Currency_OID);
		$criteria->compare('Continent',$this->Continent,true);
		$criteria->compare('State_OID',$this->State_OID);
		$criteria->compare('TimeZoneOID',$this->TimeZoneOID);
		$criteria->compare('LocationCode',$this->LocationCode,true);
		$criteria->compare('Department_f',$this->Department_f);
		$criteria->compare('UltiProBatchID',$this->UltiProBatchID,true);
		$criteria->compare('City_OID',$this->City_OID);
		$criteria->compare('ProductionLocationCode',$this->ProductionLocationCode,true);
		$criteria->compare('Email',$this->Email,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Location the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
