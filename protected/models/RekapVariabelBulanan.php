<?php

/**
 * This is the model class for table "rekap_variabel_bulanan".
 *
 * The followings are the available columns in table 'rekap_variabel_bulanan':
 * @property integer $id_rekapvariabel_bl
 * @property integer $id_variabel_satker
 * @property string $nilai_variabel_bl
 * @property integer $periode_bln
 * @property integer $periode_thn
 * @property string $tgl_input_bl
 * @property integer $user_id
 *
 * The followings are the available model relations:
 * @property VariabelSatker $idVariabelSatker
 */
class RekapVariabelBulanan extends CActiveRecord
{
	public $year;

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'rekap_variabel_bulanan';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id_variabel_satker, nilai_variabel_bl, periode_bln, periode_thn, tgl_input_bl, user_id', 'required'),
			array('id_variabel_satker, periode_bln, periode_thn, user_id', 'numerical', 'integerOnly'=>true),
			array('nilai_variabel_bl', 'length', 'max'=>19),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id_rekapvariabel_bl, id_variabel_satker, nilai_variabel_bl, periode_bln, periode_thn, tgl_input_bl, user_id, year', 'safe'),
			array('id_rekapvariabel_bl, id_variabel_satker, nilai_variabel_bl, periode_bln, periode_thn, tgl_input_bl, user_id, year', 'safe', 'on'=>'search'),
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
			'id_rekapvariabel_bl' => 'Id Rekapvariabel Bl',
			'id_variabel_satker' => 'Id Variabel Satker',
			'nilai_variabel_bl' => 'Nilai Variabel Bl',
			'periode_bln' => 'Periode Bln',
			'periode_thn' => 'Periode Thn',
			'tgl_input_bl' => 'Tgl Input Bl',
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

		$criteria->compare('id_rekapvariabel_bl',$this->id_rekapvariabel_bl);
		$criteria->compare('id_variabel_satker',$this->id_variabel_satker);
		$criteria->compare('nilai_variabel_bl',$this->nilai_variabel_bl,true);
		$criteria->compare('periode_bln',$this->periode_bln);
		$criteria->compare('periode_thn',$this->periode_thn);
		$criteria->compare('tgl_input_bl',$this->tgl_input_bl,true);
		$criteria->compare('user_id',Yii::app()->user->id);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return RekapVariabelBulanan the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	public static function getDataPerBulan($bulan, $tahun, $id_var_satker){
		$model = RekapVariabelBulanan::model()->find(array(
			'condition'=>'id_variabel_satker = :idv AND periode_bln = :pb AND periode_thn = :pth',
			'params'=>array(':idv'=>$id_var_satker, ':pb'=>$bulan, ':pth'=>$tahun)
		));

		if($model != null){
			return $model->nilai_variabel_bl;
		}else{
			return 0;
		}
		
	}

	public static function getPersenLaporanBulanan($id_indikator, $id_satker, $bulan, $tahun){
		$indikator = Indikator::model()->findByPk($id_indikator);

		$variabelSatkerNum = VariabelSatker::model()->find(array(
			'condition'=>'id_satker = :ids AND id_variabel = :idv',
			'params'=>array(':ids'=>$id_satker, ':idv'=>$indikator->variabel_1)
		));

		$variabelSatkerDen = VariabelSatker::model()->find(array(
			'condition'=>'id_satker = :ids AND id_variabel = :idv',
			'params'=>array(':ids'=>$id_satker, ':idv'=>$indikator->variabel_2)
		));

		$nilaiNum = RekapVariabelBulanan::model()->find(array(
			'condition'=>'id_variabel_satker = :idv AND periode_bln = :bln AND periode_thn = :thn',
			'params'=>array(':idv'=>$variabelSatkerNum->id_variabel_satker, ':bln'=>$bulan, ':thn'=>$tahun)
		));

		$nilaiDen = RekapVariabelBulanan::model()->find(array(
			'condition'=>'id_variabel_satker = :idv AND periode_bln = :bln AND periode_thn = :thn',
			'params'=>array(':idv'=>$variabelSatkerDen->id_variabel_satker, ':bln'=>$bulan, ':thn'=>$tahun)
		));

		$numerator = 0;
		$denumerator = 0;

		if($nilaiNum != null){
			$numerator = $nilaiNum->nilai_variabel_bl;
		}

		if($nilaiDen != null){
			$denumerator = $nilaiDen->nilai_variabel_bl;
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
