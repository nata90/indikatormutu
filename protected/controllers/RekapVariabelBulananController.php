<?php

class RekapVariabelBulananController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/column1';

	/**
	 * @return array action filters
	 */
	public function filters()
	{
		return array(
			'accessControl', // perform access control for CRUD operations
			'postOnly + delete', // we only allow deletion via POST request
		);
	}

	/**
	 * Specifies the access control rules.
	 * This method is used by the 'accessControl' filter.
	 * @return array access control rules
	 */
	public function accessRules()
	{
		return array(
			array('allow',  // allow all users to perform 'index' and 'view' actions
				'actions'=>array('index','view'),
				'users'=>array('*'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','update','admin','delete','laporanbulanan','laporanindikatorbulanan','simpannilai'),
				'users'=>array('@'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','delete'),
				'users'=>array('admin'),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}

	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionView($id)
	{
		$this->render('view',array(
			'model'=>$this->loadModel($id),
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		if(isset($_GET['idsat'])){
			$idSatker = $_GET['idsat'];
		}else {
			$idSatker = Yii::app()->user->idsatker;
		}
		
		$model=    new RekapVariabelBulanan;
		$model2 =  VariabelSatker::model()->findAll(array(
					'with'=>'idVariabel',
					'condition'=>'id_satker=:id AND idVariabel.status_variabel=1',
					'params'=>array(':id'=>$idSatker),
				));

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['RekapVariabelBulanan']))
		{
			$model->attributes=$_POST['RekapVariabelBulanan'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->id_rekapvariabel_bl));
		}

		$this->render('create',array(
			'model'=>$model,
			'model2'=>$model2,
		));
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{
		$model=$this->loadModel($id);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['RekapVariabelBulanan']))
		{
			$model->attributes=$_POST['RekapVariabelBulanan'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->id_rekapvariabel_bl));
		}

		$this->render('update',array(
			'model'=>$model,
		));
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id)
	{
		$this->loadModel($id)->delete();

		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$dataProvider=new CActiveDataProvider('RekapVariabelBulanan');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		
		$model=new RekapVariabelBulanan('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['RekapVariabelBulanan']))
			$model->attributes=$_GET['RekapVariabelBulanan'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	public function actionLaporanbulanan()
	{
		if(isset($_GET['idsat'])){
			$idSatker = $_GET['idsat'];
		}else {
			$idSatker = Yii::app()->user->idsatker;
		}
		
		$model=new RekapVariabelBulanan('search');
		$model2 = VariabelSatker::model()->findAll(array(
					'with'=>'idVariabel',
					'condition'=>'id_satker=:id AND idVariabel.status_variabel=1',
					'params'=>array(':id'=>$idSatker),
				));
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['RekapVariabelBulanan']))
			$model->attributes=$_GET['RekapVariabelBulanan'];

		$this->render('laporan_bulanan',array(
			'model'=>$model,
			'model2'=>$model2,
		));
	}

	public function actionSimpanNilai()
	{	
		$bulan				= $_GET['bulan'];
		$tahun				= $_GET['tahun'];
		$id_variabel_satker	= $_GET['variabelsatker'];
		$nilai 				= $_GET['nilai'];
		$today				= date('Y-m-d');
		$cekUpdate			= RekapVariabelBulanan::model()->findByAttributes(array('periode_bln'=>$bulan,'periode_thn'=>$tahun,'id_variabel_satker'=>$id_variabel_satker, 'nilai_variabel_bl'=>$nilai));
		if($cekUpdate!=null){
//+++++++++++++++++++++++++++++Update+++++++++++++++++++++++++++++++++
			$cekUpdate->setAttributes(array(
						'nilai' =>$nilai,
						));
			if($cekUpdate->save())
				{
					$rows['msg'] = 'Data berhasil diupdate';
				}else{
					$rows['msg'] = 'Data gagal diupdate';
				}
//+++++++++++++++++++++++++++++Update+++++++++++++++++++++++++++++++++
		}else{		
		//+++++++++++++++++++++++++++++Input+++++++++++++++++++++++++++++++++
				$model=new RekapVariabelBulanan();
				$model2  = VariabelSatker::model()->findByAttributes(array('id_variabel_satker'=>$id_variabel_satker));
				
				$model->id_variabel_satker	= $id_variabel_satker;
				$model->periode_bln			= $bulan;
				$model->periode_thn			= $tahun;
				$model->nilai_variabel_bl	= $nilai;
				$model->tgl_input_bl		= $today;
				$model->user_id				= Yii::app()->user->id;

				if($model->save())
				{
					$rows['msg'] = 'Data berhasil disimpan';
				}else{
					$rows['msg'] = 'Data gagal disimpan';
				}
		}
		//+++++++++++++++++++++++++++++Input+++++++++++++++++++++++++++++++++
				$this->_sendResponse(200, CJSON::encode($rows));
	}
	
	public function actionLaporanindikatorbulanan()
	{
		if(isset($_GET['idsat'])){
		$idSatker = $_GET['idsat'];
		}else {
			$idSatker = Yii::app()->user->idsatker;
		}
		
		$model=new Indikator('search');
		$model2 = IndSatker::model()->findAll(array(
					'with'=>'idIndikator',
					'condition'=>'id_satker=:id AND idIndikator.status=1',
					'params'=>array(':id'=>$idSatker),
				));
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Indikator']))
			$model->attributes=$_GET['Indikator'];

		$this->render('laporan_indikator_bulanan',array(
			'model'=>$model,
			'model2'=>$model2,
		));
	}
	
	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return RekapVariabelBulanan the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=RekapVariabelBulanan::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param RekapVariabelBulanan $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='rekap-variabel-bulanan-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
