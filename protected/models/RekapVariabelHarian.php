<?php

/**
 * This is the model class for table "rekap_variabel_harian".
 *
 * The followings are the available columns in table 'rekap_variabel_harian':
 * @property integer $id_rekapvariabel_hr
 * @property integer $id_variabel_satker
 * @property string $tgl_data
 * @property string $nilai_variabel_hr
 * @property string $tgl_input_hr
 * @property integer $user_id
 *
 * The followings are the available model relations:
 * @property VariabelSatker $idVariabelSatker
 */
class RekapVariabelHarian extends CActiveRecord
{
	public $month;
	public $year;

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'rekap_variabel_harian';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id_variabel_satker, tgl_data, nilai_variabel_hr, tgl_input_hr, user_id', 'required'),
			array('id_variabel_satker, user_id', 'numerical', 'integerOnly'=>true),
			array('nilai_variabel_hr', 'length', 'max'=>19),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id_rekapvariabel_hr, id_variabel_satker, tgl_data, nilai_variabel_hr, tgl_input_hr, user_id, month, year', 'safe'),
			array('id_rekapvariabel_hr, id_variabel_satker, tgl_data, nilai_variabel_hr, tgl_input_hr, user_id, month, year', 'safe', 'on'=>'search'),
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
			'idVariabelSatker' => array(self::BELONGS_TO, 'VariabelSatker', 'id_variabel_satker'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id_rekapvariabel_hr' => 'Id Rekapvariabel Hr',
			'id_variabel_satker' => 'Id Variabel Satker',
			'tgl_data' => 'Tgl Data',
			'nilai_variabel_hr' => 'Nilai Variabel Hr',
			'tgl_input_hr' => 'Tgl Input Hr',
			'user_id' => 'User',
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

		$criteria->compare('id_rekapvariabel_hr',$this->id_rekapvariabel_hr);
		$criteria->compare('id_variabel_satker',$this->id_variabel_satker);
		$criteria->compare('tgl_data',$this->tgl_data,true);
		$criteria->compare('nilai_variabel_hr',$this->nilai_variabel_hr,true);
		$criteria->compare('tgl_input_hr',$this->tgl_input_hr,true);
		$criteria->compare('user_id',Yii::app()->user->id);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return RekapVariabelHarian the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	public static function getDataPerTanggal($tanggalData, $idVariabel, $userId){

		file_put_contents('filename_'.$idVariabel.'.txt', $tanggalData.' '.$idVariabel.' '.$userId);
		$model = RekapVariabelHarian::model()->find(array(
			'with'=>'idVariabelSatker',
			'condition'=>'tgl_data = :tgl AND idVariabelSatker.id_variabel = :ivs AND user_id = :uid',
			'params'=>array(':tgl'=>date('Y-m-d', strtotime($tanggalData)), ':ivs'=>$idVariabel, ':uid'=>$userId)
		));

		$return = 0;
		if($model != null){
			$return = $model->nilai_variabel_hr;
		}

		return $return;
	}
}
