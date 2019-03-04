<?php

/**
 * This is the model class for table "variabel".
 *
 * The followings are the available columns in table 'variabel':
 * @property integer $id_variabel
 * @property string $uraian_variabel
 * @property integer $status_variabel
 *
 * The followings are the available model relations:
 * @property VariableSatker[] $variableSatkers
 */
class Variabel extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'variabel';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('uraian_variabel, status_variabel', 'required'),
			array('status_variabel', 'numerical', 'integerOnly'=>true),
			array('uraian_variabel', 'length', 'max'=>255),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id_variabel, uraian_variabel, status_variabel', 'safe', 'on'=>'search'),
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
			'variableSatkers' => array(self::HAS_MANY, 'VariableSatker', 'id_variabel'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id_variabel' => 'Id Variabel',
			'uraian_variabel' => 'Uraian Variabel',
			'status_variabel' => 'Status Variabel',
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

		$criteria->compare('id_variabel',$this->id_variabel);
		$criteria->compare('uraian_variabel',$this->uraian_variabel,true);
		$criteria->compare('status_variabel',$this->status_variabel);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Variabel the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
