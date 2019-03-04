<?php

/**
 * This is the model class for table "variabel_satker".
 *
 * The followings are the available columns in table 'variabel_satker':
 * @property integer $id_variabel_satker
 * @property integer $id_variabel
 * @property integer $id_satker
 *
 * The followings are the available model relations:
 * @property RekapVariabelBulanan[] $rekapVariabelBulanans
 * @property RekapVariabelHarian[] $rekapVariabelHarians
 * @property Variabel $idVariabel
 * @property Satker $idSatker
 */
class VariabelSatker extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'variabel_satker';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id_variabel, id_satker, status_variabel_satker', 'required'),
			array('id_variabel, id_satker, status_variabel_satker', 'numerical', 'integerOnly'=>true),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id_variabel_satker, id_variabel, id_satker, status_variabel_satker', 'safe', 'on'=>'search'),
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
			'rekapVariabelBulanans' => array(self::HAS_MANY, 'RekapVariabelBulanan', 'id_variabel_satker'),
			'rekapVariabelHarians' => array(self::HAS_MANY, 'RekapVariabelHarian', 'id_variabel_satker'),
			'idVariabel' => array(self::BELONGS_TO, 'Variabel', 'id_variabel'),
			'idSatker' => array(self::BELONGS_TO, 'Satker', 'id_satker'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id_variabel_satker' => 'Id Variabel Satker',
			'id_variabel' => 'Id Variabel',
			'id_satker' => 'Id Satker',
			'status_variabel_satker' => 'Status Variabel Satker',
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

		$criteria->compare('id_variabel_satker',$this->id_variabel_satker);
		$criteria->compare('id_variabel',$this->id_variabel);
		$criteria->compare('id_satker',$this->id_satker);
		$criteria->compare('status_variabel_satker',$this->status_variabel_satker);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return VariabelSatker the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
