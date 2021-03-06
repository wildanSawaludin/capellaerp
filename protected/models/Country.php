<?php

/**
 * This is the model class for table "country".
 *
 * The followings are the available columns in table 'country':
 * @property integer $countryid
 * @property string $countrycode
 * @property string $countryname
 * @property integer $recordstatus
 *
 * The followings are the available model relations:
 * @property Province[] $provinces
 */
class Country extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return Country the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'country';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('countrycode, countryname, recordstatus', 'required'),
			array('recordstatus', 'numerical', 'integerOnly'=>true),
			array('countrycode', 'length', 'max'=>5),
			array('countryname', 'length', 'max'=>50),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('countryid, countrycode, countryname, recordstatus', 'safe', 'on'=>'search'),
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
			'provinces' => array(self::HAS_MANY, 'Province', 'countryid'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'countryid' => 'Data',
			'countrycode' => 'Country Code',
			'countryname' => 'Country',
			'recordstatus' => 'Record Status',
		);
	}
	
	private function comparedb($criteria)
	{
		if (isset($_GET['countrycode']))
{
	$criteria->compare('countrycode',$_GET['countrycode'],true);
}
		if (isset($_GET['countryname']))
{
	$criteria->compare('countryname',$_GET['countryname'],true);
}
}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;
		$this->comparedb($criteria);
		$criteria->compare('countryid',$this->countryid);
		$criteria->compare('countrycode',$this->countrycode,true);
		$criteria->compare('countryname',$this->countryname,true);

		return new CActiveDataProvider(get_class($this), array(
'pagination'=>array(
        'pageSize'=> Yii::app()->user->getState('pageSize',Yii::app()->params['defaultPageSize']),
    ),
			'criteria'=>$criteria,
		));
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function searchwstatus()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;
    $criteria->condition='recordstatus=1';
	$this->comparedb($criteria);
		$criteria->compare('countryid',$this->countryid);
		$criteria->compare('countrycode',$this->countrycode,true);
		$criteria->compare('countryname',$this->countryname,true);

		return new CActiveDataProvider(get_class($this), array(
'pagination'=>array(
        'pageSize'=> Yii::app()->user->getState('pageSize',Yii::app()->params['defaultPageSize']),
    ),
			'criteria'=>$criteria,
		));
	}
}