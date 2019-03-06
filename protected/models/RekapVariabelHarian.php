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
	public $satker;

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
			array('id_rekapvariabel_hr, id_variabel_satker, tgl_data, nilai_variabel_hr, tgl_input_hr, user_id, month, year, satker', 'safe'),
			array('id_rekapvariabel_hr, id_variabel_satker, tgl_data, nilai_variabel_hr, tgl_input_hr, user_id, month, year, satker', 'safe', 'on'=>'search'),
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
			'user_rel' => array(self::BELONGS_TO, 'User', 'user_id'),
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

	public static function getDataPerTanggal($tanggalData, $idVariabel, $idSatker){

		$model = RekapVariabelHarian::model()->find(array(
			'with'=>array('idVariabelSatker','user_rel'),
			'condition'=>'tgl_data = :tgl AND idVariabelSatker.id_variabel = :ivs AND user_rel.id_satker = :sid',
			'params'=>array(':tgl'=>date('Y-m-d', strtotime($tanggalData)), ':ivs'=>$idVariabel, ':sid'=>$idSatker)
		));

		$return = '-';
		if($model != null){
			$return = $model->nilai_variabel_hr;
		}

		return $return;
	}


	public static function getPersenLaporanHarian($idIndikator, $idSatker, $hari, $bulan, $tahun){
		$indikator = Indikator::model()->findByPk($idIndikator);
		$tgl =date('Y-m-d', strtotime($tahun.'-'.$bulan.'-'.$hari));

		$variabelSatkerNum = VariabelSatker::model()->find(array(
			'condition'=>'id_satker = :ids AND id_variabel = :idv',
			'params'=>array(':ids'=>$idSatker, ':idv'=>$indikator->variabel_1)
		));

		$variabelSatkerDen = VariabelSatker::model()->find(array(
			'condition'=>'id_satker = :ids AND id_variabel = :idv',
			'params'=>array(':ids'=>$idSatker, ':idv'=>$indikator->variabel_2)
		));

		$nilaiNum = RekapVariabelHarian::model()->find(array(
			'condition'=>'id_variabel_satker = :idv AND tgl_input_hr = "'.$tgl.'"',
			'params'=>array(':idv'=>$variabelSatkerNum->id_variabel_satker)
		));

		$nilaiDen = RekapVariabelHarian::model()->find(array(
			'condition'=>'id_variabel_satker = :idv AND tgl_input_hr = "'.$tgl.'"',
			'params'=>array(':idv'=>$variabelSatkerDen->id_variabel_satker)
		));

		$numerator = 0;
		$denumerator = 0;

		if($nilaiNum != null){
			$numerator = $nilaiNum->nilai_variabel_hr;
		}

		if($nilaiDen != null){
			$denumerator = $nilaiDen->nilai_variabel_hr;
		}

		if($numerator != 0 && $denumerator == 0){
			$nilaiPersen = 'N/A';
		}else{
			$persen = round((($numerator/$denumerator)*100), 2);
			$nilaiPersen = $persen.'%';
		}

		if($numerator == 0 && $denumerator == 0){
			$nilaiPersen = '0%';
		}

		$return['numerator'] = $numerator;
		$return['denumerator'] = $denumerator;
		$return['persen'] = $nilaiPersen;
		

		return $return;
	}
}
