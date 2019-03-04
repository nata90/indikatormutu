<?php
/**
 * Utility class file
 *
 * Contains many function that most used
 */

class Utility
{

	public static function  curPageURL() {
		$pageURL = 'http';
		if ($_SERVER["HTTPS"] == "on") {$pageURL .= "s";}
			$pageURL .= "://";
		if ($_SERVER["SERVER_PORT"] != "80") {
			$pageURL .= $_SERVER["SERVER_NAME"].":".$_SERVER["SERVER_PORT"].$_SERVER["REQUEST_URI"];
		}else {
			$pageURL .= $_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"];
		}
		return $pageURL;
	}

	/*
	* Return setting template with typePage: public, admin_sweeto or back_office
	*/
	public static function getPublishedToImg($pub) {
		if($pub == 1)
			return CHtml::image(Yii::app()->theme->baseUrl .'/img/icons/publish.png', 'published', array('title'=>Yii::t('site', 'published')));
		else if($pub == 0)
			return CHtml::image(Yii::app()->theme->baseUrl .'/img/icons/unpublish.png', 'un-published', array('title'=>Yii::t('site', 'unpublished')));
		else if($pub == 2)
			return CHtml::image(Yii::app()->theme->baseUrl .'/img/icons/publish2.png', 'un-published', array('title'=>Yii::t('site', 'unpublished')));
	}
	
	
	public static function getStatusIsi($id) {
		if($id == 1)
			return CHtml::image(Yii::app()->theme->baseUrl .'/img/icons/isi.png', 'Isi', array('title'=>Yii::t('site', 'Isi')));
		else if($id == 0)
			return CHtml::image(Yii::app()->theme->baseUrl .'/img/icons/kosong.png', 'Kosng', array('title'=>Yii::t('site', 'Kosong')));
		 
	}
	
	public static function getCurrentLayout($groupPage) {
		// $groupAdmin = array(1,2);//super admin, admin
		$groupAdmin = array(1);//super admin, admin
		if(in_array($groupPage, $groupAdmin)){
			$layout = 'default';
		}else {
			$layout = 'index';
		}
		return $layout;
	}
	
	public static function linkWpopup($id, $desc, $forId, $forDesc, $forClear=null) {
		$link = '<a class="link-wpopup" style="color: rgb(255,0,0)" forClear="'.$forClear.'" forId="'.$forId.'"  forDesc="'.$forDesc.'" id="'.$id.'" name="'.$desc.'" href="javascript:void(0);">'.$desc.'</a>';
		return $link;
	}
	
	public static function linkWpopup2($id, $desc, $forId, $forDesc, $forClear=null) {
		$forClear = Yii::app()->createUrl($forClear);
		$link = '<a class="link-wpopup2" style="color: rgb(255,0,0)" forClear="'.$forClear.'" forId="'.$forId.'"  forDesc="'.$forDesc.'" id="'.$id.'" name="'.$desc.'" href="javascript:void(0);">'.$desc.'</a>';
		return $link;
	}

	public static function linkWpopup3($id, $desc, $forId, $forDesc, $forClear=null, $url, $avl=null) {
		$url = Yii::app()->createUrl($url);
		if($avl == null){
			$link = '<a class="link-wpopup3"  style="color: rgb(255,0,0)" forClear="'.$forClear.'" forId="'.$forId.'"  forDesc="'.$forDesc.'" id="'.$id.'" name="'.$desc.'" href="javascript:void(0);"  url="'. $url .'">'.$desc.'</a>';
		}else if($avl == 0) {
			$link = '<a class="link-wpopup3"  style="color: rgb(255,0,0)" forClear="'.$forClear.'" forId="'.$forId.'"  forDesc="'.$forDesc.'" id="'.$id.'" name="'.$desc.'" href="javascript:void(0);"  url="'. $url .'">'.$desc.'</a>';
		}else {
			$link =  $desc ;
		}
		
		return $link;
	} 
	
	public static function linkWpopup4($id, $desc, $forId, $forDesc, $forClear=null, $url, $avl=null) {
		$url = Yii::app()->createUrl($url);
		if($avl == null){
			$link = '<a class="link-wpopup4"  style="color: rgb(255,0,0)" forClear="'.$forClear.'" forId="'.$forId.'"  forDesc="'.$forDesc.'" id="'.$id.'" name="'.$desc.'" href="javascript:void(0);"  url="'. $url .'">'.$desc.'</a>';
		}else if($avl == 0) {
			$link = '<a class="link-wpopup4"  style="color: rgb(255,0,0)" forClear="'.$forClear.'" forId="'.$forId.'"  forDesc="'.$forDesc.'" id="'.$id.'" name="'.$desc.'" href="javascript:void(0);"  url="'. $url .'">'.$desc.'</a>';
		}else {
			$link =  $desc ;
		}
		
		return $link;
	}
	
	public static function linkWpopup5($id, $desc, $url , $avl=null) {
		$url = Yii::app()->createUrl($url);
		if($avl == null){
			$link = '<a class="link-wpopup5"  style="color: rgb(255,0,0)"   id="'.$id.'"   href="javascript:void(0);"  url="'. $url .'">'.$desc.'</a>';
		}else if($avl == 0) {
			$link = '<a class="link-wpopup5"  style="color: rgb(255,0,0)"   id="'.$id.'"   href="javascript:void(0);"  url="'. $url .'">'.$desc.'</a>';
		}else {
			$link =  $desc ;
		}
		
		return $link;
	}
	
	
	public static function dateFormat($format, $date) {
		$data = date($format, strtotime($date)); 
		return $data;
	}
	
	public static function cekAdmin($id) {
		$groupAdminArr = array(1,2);
		$group = AppUser::model()->findByPk($id)->id_group; 
		if(in_array($group, $groupAdminArr)){ //admin
			$admin = true;
		}else {
			$admin = false;
		}
		return $admin;
	}
	
	public static function rupiah($nominal) {
		 $rupiah =  number_format($nominal,0, ",",".");
		 $rupiah = "Rp "  . $rupiah . ",00";
		 return $rupiah;
	}
	
	public static function nominal($nominal = null) {
		$rupiah = '';
		// $rupiah = "Rp "  . $rupiah . ",00";
		if($nominal == null){
			return $rupiah;
		}else{
			$rupiah =  number_format($nominal,0, ",",".");
			return $rupiah;
		}
	}
	
	
	public static function nominal2($nominal = null) {
		$rupiah = '';
		// $rupiah = "Rp "  . $rupiah . ",00";
		if($nominal == null){
			return $rupiah;
		}else{
			$rupiah =  number_format($nominal,0, ",",",");
			return $rupiah;
		}
	}

	public static function nominalDecimal($nominal = null){
		$rupiah = '';
		// $rupiah = "Rp "  . $rupiah . ",00";
		if($nominal == null){
			return $rupiah;
		}else{
			$rupiah =  number_format($nominal,2, ",",".");
			return $rupiah;
		}
	}
	
	public static function listBulanArr($key = null) {
		$bulanArr = array(
			'01'=>'Januari',
			'02'=>'Februari',
			'03'=>'Maret',
			'04'=>'April',
			'05'=>'Mei',
			'06'=>'Juni',
			'07'=>'Juli',
			'08'=>'Agustus',
			'09'=>'September',
			'10'=>'Oktober',
			'11'=>'November',
			'12'=>'Desember'
		);
		if($key == null){
			return $bulanArr;
		}else {
			return $bulanArr[$key];
		}
		
	}
	
	
	public static function listBulanArr2($key = null) {
		$bulanArr = array(
			'1'=>'Januari',
			'2'=>'Februari',
			'3'=>'Maret',
			'4'=>'April',
			'5'=>'Mei',
			'6'=>'Juni',
			'7'=>'Juli',
			'8'=>'Agustus',
			'9'=>'September',
			'10'=>'Oktober',
			'11'=>'November',
			'12'=>'Desember'
		);
		if($key == null){
			return $bulanArr;
		}else {
			return $bulanArr[$key];
		}
	}
	
	public static function listTahunArr($start, $end) {
		$tahunArr1 = range($start, $end);
		$tahunArr2 = range($start, $end);
		$arr = array_combine($tahunArr1,$tahunArr2);
		return $arr;
	}

	public static function getButton($id, $urlView, $urlEdit, $urlDelete) {
		
		//$html = '<a href="javascript:void(0);" id="'.$id.'"  url="'.$urlEdit.'"  class="editajax">edit</a>';
		$html .= '<a href="javascript:void(0);" id="'.$id.'" url="'.$urlDelete.'" class="deleteajax" >hapus</a>';
		 
		return $html;
	}
	
	public static function getButton2($id, $urlView, $urlEdit, $urlDelete) {
		
		//$html = '<a href="javascript:void(0);" id="'.$id.'"  url="'.$urlEdit.'"  class="editajax">edit</a>';
		$html .= '<a href="javascript:void(0);" id="'.$id.'" url="'.$urlDelete.'" class="deleteajax-2" >hapus</a>';
		 
		return $html;
	}

	public static function terbilang($x)
	{
		$abil = array("", "satu", "dua", "tiga", "empat", "lima", "enam", "tujuh", "delapan", "sembilan", "sepuluh", "sebelas");
		if ($x < 12){
			return " " . $abil[$x];
		}else if ($x < 20) {
			return Utility::terbilang($x - 10) . " belas";
		}else if ($x < 100) {
			return Utility::terbilang($x / 10) . " puluh" . Utility::terbilang($x % 10);
		}else if ($x < 200) {
			return " seratus" . Utility::terbilang($x - 100);
		}else if ($x < 1000) {
			return Utility::terbilang($x / 100) . " ratus" . Utility::terbilang($x % 100);
		}else if ($x < 2000) {
			return " seribu" . Utility::terbilang($x - 1000);
		}else if ($x < 1000000) {
			return Utility::terbilang($x / 1000) . " ribu" . Utility::terbilang($x % 1000);
		}else if ($x < 1000000000) {
			return Utility::terbilang($x / 1000000) . " juta" . Utility::terbilang($x % 1000000); 
		}else if ($x < 1000000000000) {
			return Utility::terbilang($x / 1000000000) . " milyar" . Utility::terbilang($x - (floor($x / 1000000000)) * 1000000000); 
		} 
	}
	
	public static function getExpression(){
		if(Yii::app()->user->isGuest){
			$a = 0;
		}else {
			$idGroup = Yii::app()->user->idgroup;
			if(isset(Yii::app()->session['sessiongroup'])){
				$idGroup = Yii::app()->session['sessiongroup'];
			}
			$url = Yii::app()->urlManager->parseUrl(Yii::app()->request); 
			$cekMenu = AppMenu::model()->findByAttributes(array('url'=>$url));
			if($cekMenu != null){
				$model=AppMenuForGroup::model()->find(array(
						'with'=>'idMenu',
						'condition'=>'id_group =:idgroup AND tayang = 1 AND idMenu.url =:url',
						'params'=>array(':idgroup'=>$idGroup, ':url'=>$url),
					));
				if($model != null){
					$a = 1;
				}else {
					$a = 0;
				}
			}else {
				$a = 1;
			}
		}
		
		return $a;
	}
	
	public static function getJk($jk=null){
		$jkArr = array(
				'1'=>'Laki-Laki',
				'2'=>'Perempuan',
			);

		if($jk == null){
			return $jkArr;
		}else {
			return $jkArr[$jk];
		}

	}

	public static function getStatusPegawai($stat=null){
		$statArr = array(
				'1'=>'PNS',
				'2'=>'BLU',
			);

		if($stat == null){
			return $statArr;
		}else {
			return $statArr[$stat];
		}

	}	

	public static function getIpClient(){
		$ipaddress = '';
		if (getenv('HTTP_CLIENT_IP'))
			$ipaddress = getenv('HTTP_CLIENT_IP');
		else if(getenv('HTTP_X_FORWARDED_FOR'))
			$ipaddress = getenv('HTTP_X_FORWARDED_FOR');
		else if(getenv('HTTP_X_FORWARDED'))
			$ipaddress = getenv('HTTP_X_FORWARDED');
		else if(getenv('HTTP_FORWARDED_FOR'))
			$ipaddress = getenv('HTTP_FORWARDED_FOR');
		else if(getenv('HTTP_FORWARDED'))
		   $ipaddress = getenv('HTTP_FORWARDED');
		else if(getenv('REMOTE_ADDR'))
			$ipaddress = getenv('REMOTE_ADDR');
		else
			$ipaddress = 'UNKNOWN';
			
			
		return  $ipaddress; 
	}
	
	public static function getMacClient($ippc){
		$mac = AppUserIp::getMacClient($ippc); 
		return  $mac; 
	}
	
	
	public static function getNamePcClient(){
		$namepc = gethostbyaddr($_SERVER['REMOTE_ADDR']);
		return  $namepc; 
	} 

	//get digit kunjungan
	public static function getDigitKunjungan($kunjungan){
		$kunj = trim($kunjungan);

		if($kunj == 1)
			$return = '0'.$kunj;
		else
			$return = "$kunjungan";

		return $return;
	}
	
	public static function tombolDelete()
	{
		$delete = Yii::app()->user->idgroup; 
		if($delete == 1 || $delete == 2) {
			$data = true;
			
		}else {
			$data = false;
			
		}
			
		return $data; 
	} 

	public static function isAdmin()
	{
		$delete = Yii::app()->user->idgroup; 
		if($delete == 1 || $delete == 2) {
			$data = true; 
		}else {
			$data = false; 
		} 
		return $data; 
	}
	
	
	/* if(Utility::AllAksesPasien(Yii::app()->user->idgroup)) */
	public static function allAksesPoli($idgroup)
	{
		$groupArr = array(
			'10'=>'10' //Kasa IRJ
		);
		
		if(array_key_exists($idgroup, $groupArr)){
			$akses = true;
		}else {
			$akses = false;
		}
		return $akses;
	}
	
	
	public static function getFullNameLogin($full)
	{
		if($full){
			$model = AppUser::model()->findByPk(Yii::app()->user->id);
			if($model->id_pegawai == 0 ){
				$name = $model->username;
			}else {
				$name = $model->pegawai_rel->nama_pegawai;
			} 
		}else {
			$model = AppUser::model()->findByPk(Yii::app()->user->id);
			$name = $model->username;
		}
		return $name; 
	}
	
	
	public static function getFullUser($id)
	{
		// if($full){
			$model = AppUser::model()->findByPk($id);
			if($model != null){
				if($model->id_pegawai == 0 ){
					$name = $model->username;
				}else {
					$name = $model->pegawai_rel->nama_pegawai;
				}
			}else {
				$name = $id;
			}
			 
		// }else {
			// $model = AppUser::model()->findByPk(Yii::app()->user->id);
			// $name = $model->username;
		// }}else {
			// $model = AppUser::model()->findByPk(Yii::app()->user->id);
			// $name = $model->username;
		// }}else {
			// $model = AppUser::model()->findByPk(Yii::app()->user->id);
			// $name = $model->username;
		// }
		return $name; 
	}
	
	public static function getNoRegister($rm, $kunj){
		$model = MrRegister::model()->findByAttributes(array('NomorRM'=>$rm,'Kunjungan'=>$kunj));
		if($model != null){
			$nomor = $model->NoRegister;
		}else {
			$nomor = '0';
		}
		return $nomor;
	}
	
	
	public static function setStatusPasien($rm, $status){ //0=non aktif, 1=rawat jalan, 2=igd, 3=rawat inap
		$model = Dataindukpasien::model()->updateByPk($rm, array('StatusPasien'=>$status)); 
		// $model = Dataindukpasien::model()->updateByPk($rm, array('StatusPasien'=>$status)); 
		// $model = Dataindukpasien::model()->updateByPk($rm, 'StatusPasien = :StatusPasien', array(':StatusPasien'=>$status));
		return $model;
	}
	
	
	public static function getStatusPasien($status=null){ //0=non aktif, 1=rawat jalan, 2=igd, 3=rawat inap
		$statusArr = array(
			'0'=>'Non Aktif',
			'1'=>'Rawat Jalan',
			'2'=>'IGD',
			'3'=>'Rawat Inap',
		);
		if($status==null){
			$data = $statusArr; 
		}else {
			$data = $statusArr[$status]; 
		}
		
		return $data;
	}

	public static function getKodedokterArr($id){ 
		$model=AppUserGdokter::model()->findAllByAttributes(array('id_user'=>$id));
		$kodeArr=array();
		if($model!=null){
			foreach ($model as $value) {
				$kodeArr[$value->kd_dokter] = $value->kd_dokter;
			}

		}
		return $kodeArr;
	}

	public static function getdetailUsia($tglLahir){
		$interval = date_diff(date_create(), date_create($tglLahir));			
		$rows = array();		
		$rows['tahun']	= $interval->format("%Y");
		$rows['bulan']	= $interval->format("%M");
		$rows['hari']	= $interval->format("%d");

		return $rows;
	}
	public static function getRuangUserLogin(){  
		$model = AppUserAkses::model()->findAllByAttributes(array('id_user'=>Yii::app()->user->id));
		if($model != null){ 
			foreach($model as $key=>$val){
				$modelArr[$val->KodeUnitPelayanan] = $val->unit_rel->UnitPelayanan;
			}
		}else {
			$modelArr = array();
		}
		return $modelArr;
	}
	
	
	public static function getRuangUserLoginArr(){  
		$model = AppUserAkses::model()->findAllByAttributes(array('id_user'=>Yii::app()->user->id));
		if($model != null){ 
			foreach($model as $key=>$val){
				$modelArr[$val->KodeUnitPelayanan] = $val->KodeUnitPelayanan;
			}
		}else {
			$modelArr = array();
		}
		return $modelArr;
	}
	
	public static function getRuangUserLoginArr2(){  
		$model = AppUserAkses::model()->findAllByAttributes(array('id_user'=>Yii::app()->user->id));
		if($model != null){ 
			foreach($model as $key=>$val){
				$modelArr[$val->KodeRuang] = $val->KodeRuang;
			}
		}else {
			$modelArr = array();
		}
		return $modelArr;
	}
	
	public static function getRuangUserLoginArr3(){  
		$model = AppUserAkses::model()->findAllByAttributes(array('id_user'=>Yii::app()->user->id));
		if($model != null){ 
			foreach($model as $key=>$val){
				$modelArr[$val->KodeRuang] = $val->ruang_rel2->Ruang;
			}
		}else {
			$modelArr = array();
		}
		return $modelArr;
	}
	
	
	public static function getKelamin($id=null){
		if($id == null){
			$data = array(
				'0'=>'Perempuan',
				'1'=>'Laki-Laki',
			);
		}else {
			if($id == 1 || $id == 'L'){
				$data = 'Laki-Laki';
			}else if($id == 0 || $id == 'P'){
				$data = 'Perempuan';
			}
		}	
		return $data;
	}
	
	public static function getDetailUmur($tglLahir,$select, $attr){ //selec=>0=semua array, 1=tahun, 2=tahun-bulan, 3=tahun-bulan-hari, attrt=> 0=tanpa atibut , 1=dengan atribut
		$interval = date_diff(date_create(), date_create($tglLahir));			
		
		if($attr == 0){
			if($select == 0){
				$rows['tahun']	= $interval->format("%Y");
				$rows['bulan']	= $interval->format("%M");
				$rows['hari']	= $interval->format("%d");
			}else if($select == 1){
				$rows = $interval->format("%Y");
			}else if($select == 2){
				$rows = $interval->format("%Y") .'  '. $interval->format("%M");
			}else if($select == 3){
				$rows = $interval->format("%Y") .'  '. $interval->format("%M") .' '.$interval->format("%d");
			}
		}else if($attr == 1){
			if($select == 0){
				$rows['tahun']	= $interval->format("%Y") .' Tahun';
				$rows['bulan']	= $interval->format("%M").' Bulan';
				$rows['hari']	= $interval->format("%d").' Hari';
			}else if($select == 1){
				$rows = $interval->format("%Y").' Tahun';
			}else if($select == 2){
				$rows = $interval->format("%Y") .' Tahun '. $interval->format("%M") .' Bulan';
			}else if($select == 3){
				$rows = $interval->format("%Y") .' Tahun '. $interval->format("%M") .' Bulan '.$interval->format("%d").' Hari';
			}
		} 
		
		return $rows;
	}
	
	public static function linkActionAjax($linkView=null, $linkUpdate=null, $linkDelete=null){ 
		$img = '';
		if($linkView != ''){
			$img .= '<a href="#">'.CHtml::image(Yii::app()->theme->baseUrl .'/img/icons/view.png', 'view', array('title'=>Yii::t('site', 'view'), 'class'=>'popup-window-js', 'url'=>$linkView)).'</a>';
		}
		if($linkUpdate != ''){
			$img .= '<a href="#">'.CHtml::image(Yii::app()->theme->baseUrl .'/img/icons/update.png', 'update', array('title'=>Yii::t('site', 'update'), 'class'=>'popup-window-js', 'url'=>$linkUpdate)).'</a>';
		}
		if($linkDelete != ''){
			$img .= '<a href="#">'.CHtml::image(Yii::app()->theme->baseUrl .'/img/icons/delete.png', 'delete', array('title'=>Yii::t('site', 'delete'), 'class'=>'popup-window-js', 'url'=>$linkDelete)).'</a>';
		}
	
		return $img;
	}
	
 
	/* public static function getVisibleCol()
	{
		if($full){
			$model = AppUser::model()->findByPk(Yii::app()->user->id);
			if($model->id_pegawai == 0 ){
				$name = $model->username;
			}else {
				$name = $model->pegawai_rel->nama_pegawai;
			} 
		}else {
			$model = AppUser::model()->findByPk(Yii::app()->user->id);
			$name = $model->username;
		}
		return $name; 
	} */
	
	
	
	/* if(Utility::AllAksesPasien(Yii::app()->user->idgroup)) */
	public static function AllAksesPasien($idgroup){
		$groupArr = array(
			'27'=>'27',
			'37'=>'37',  //KF
			'61'=>'61'
		);
		
		if(array_key_exists($idgroup, $groupArr)){
			$akses = true;
		}else {
			$akses = false;
		}
		return $akses;
	}
	
	
	/* if(Utility::RuangAksesSaba($ruang)) */
	public static function RuangAksesSaba($ruang){
		$ruangArr = array(
			'23'=>'23', //ipk rj
			'IPK'=>'IPK'   //ipk 
		);
		
		if(array_key_exists(trim($ruang), $ruangArr)){
			$akses = true;
		}else {
			$akses = false;
		}
		return $akses;
	}
	
	public static function RuangAksesSaba2($iduser){
		$dataAkses = AppUserAkses::model()->findAllByAttributes(array('id_user'=>$iduser));
		$akses = false;
		$ruangArr = array(
			'23'=>'23', //ipk rj
			'IPK'=>'IPK'   //ipk 
		);
		
		foreach($dataAkses as $val){
			if(array_key_exists(trim($val->KodeRuang), $ruangArr)){
				$akses = true;
			}
		} 
		return $akses;
	}
	
	public static function losDay($tgl1, $tgl2){
		$a =  date('Y-m-d', strtotime($tgl1));
		$b =  date('Y-m-d', strtotime($tgl2));
		$datetime1 = date_create($a);
		$datetime2 = date_create($b);
		$interval = date_diff($datetime1, $datetime2);
		return $interval->format("%a") + 1;
	} 

	public static function makeKode($number, $length=6, $kode=TRUE) {
	    
	    $number = (string)$number;
	    $loop = $length - strlen($number);
	    
	    $result = '';
	    for ($i=0; $i<$loop; $i++) {
	         $result .= '0';
	    }
	        $result = $kode.$result.$number;
	    return $result;
	}
	
	
	public static function getTotal($records, $columns){ //$records=dataprovider berbentuk array
		if(!is_array($columns)){
			$columns=array($columns);
		}              
		$total = array();
		$i=0;
		foreach ($records as $record) {
				foreach ($columns as $column) {
						  if(!isset($total[$column]))$total[$column]=0;
						  $total[$column] += $record[$column];
				}
			$i++;
		}
		return $total;
	}
	
	public static function makedir($path){ //$records=dataprovider berbentuk array
		if(!file_exists($path)) {
			@mkdir($path, 0777, true); 
		}
		return true;
	}
	
	public static function getDateNama($id=null){ //$id=date('N')
		$dayName = array(
			'1'=>'Senin',
			'2'=>'Selasa',
			'3'=>'Rabu',
			'4'=>'Kamis',
			'5'=>'Jumat',
			'6'=>'Sabtu',
			'7'=>'Minggu',
		);
		if($id==null){
			return $dayName;
		}else {
			return $dayName[$id];
		}
	}

	public static function rupiahToNomial($rupiah) {
		$nominal = str_replace("Rp","",$rupiah);
		$nominal = str_replace(",00","",$nominal);
		$nominal = str_replace(".","",$nominal);
		$nominal = trim($nominal);

		return (float)$nominal;
	}

	//get tanggal to word
	public static function getTanggalToWord($tanggal){
		$day = date('D', strtotime($tanggal));
		$dayList = array(
			'Sun' => 'Minggu',
			'Mon' => 'Senin',
			'Tue' => 'Selasa',
			'Wed' => 'Rabu',
			'Thu' => 'Kamis',
			'Fri' => 'Jumat',
			'Sat' => 'Sabtu'
		);

		$tang = date('j', strtotime($tanggal));
		$tah = date('Y', strtotime($tanggal));

		$bulan = date('m', strtotime($tanggal));
		Switch ($bulan){
		    case 1 : $bulan="Januari";
		        Break;
		    case 2 : $bulan="Februari";
		        Break;
		    case 3 : $bulan="Maret";
		        Break;
		    case 4 : $bulan="April";
		        Break;
		    case 5 : $bulan="Mei";
		        Break;
		    case 6 : $bulan="Juni";
		        Break;
		    case 7 : $bulan="Juli";
		        Break;
		    case 8 : $bulan="Agustus";
		        Break;
		    case 9 : $bulan="September";
		        Break;
		    case 10 : $bulan="Oktober";
		        Break;
		    case 11 : $bulan="November";
		        Break;
		    case 12 : $bulan="Desember";
		        Break;
	    }
		$return = $dayList[$day].', tanggal '.Utility::terbilang($tang).', bulan '.ucfirst($bulan).', tahun '.ucfirst(Utility::terbilang($tah));

		return $return;
	}

	function tglIndo($tanggal){
		$bulan = array (
			1 =>   'Januari',
			'Februari',
			'Maret',
			'April',
			'Mei',
			'Juni',
			'Juli',
			'Agustus',
			'September',
			'Oktober',
			'November',
			'Desember'
		);
		
		$pecahkan = explode('-', $tanggal);
		return $pecahkan[2] . ' ' . $bulan[ (int)$pecahkan[1] ] . ' ' . $pecahkan[0];
	}
	
	function setRmUse($rm, $type){ // 1=use by kassa, 2 = use by other
		Yii::import('application.models.*');

		$model = Dataindukpasien::model()->with(array('user_rel'))->findByAttributes(array(
					'NomorRM'=>$rm,
				 )); 
		$data = array(); 
		if($model != null){ 
			if($model->last_user == Yii::app()->user->id && $model->last_ip == Yii::app()->session['ip']){ 
				$model->last_use_time = date('Y-m-d H:i:s');
				$model->expired_use_time = date('Y-m-d H:i:s a', time() + 15);
				// $model->last_user = Yii::app()->user->id;
				// $model->last_ip = Yii::app()->session['ip'];
				if($type != 0)
					$model->last_user_group = $type;
				$model->save(false);
				$data['status'] = true;
				return $data;
			}else if($model->expired_use_time == '0000-00-00 00:00:00'){ //belum perdah di update
				$model->last_use_time = date('Y-m-d H:i:s');
				$model->expired_use_time = date('Y-m-d H:i:s a', time() + 15);
				$model->last_user = Yii::app()->user->id;
				$model->last_ip = Yii::app()->session['ip'];
				if($type != 0)
					$model->last_user_group = $type;
				$model->save(false);
				$data['status'] = true;
				return $data;
			}else if (strtotime(date('Y-m-d H:i:s')) >  strtotime($model->expired_use_time)){ 
				$model->last_use_time = date('Y-m-d H:i:s');
				$model->expired_use_time = date('Y-m-d H:i:s a', time() + 15);
				$model->last_user = Yii::app()->user->id;
				$model->last_ip = Yii::app()->session['ip'];
				if($type != 0)
					$model->last_user_group = $type;
				$model->save(false);
				$data['status'] = true;
				return $data;
			}else {
				if($model->last_user_group == $type){
					$data['status'] = true;
					return $data;
				}else {
					$data['msg'] = 'Nomor RM sedang di gunakan user '. $model->user_rel->username .'('. Utility::getFullUser($model->last_user) .')';
					$data['status'] = false;
					return $data;
				}
			}		
		}		
	}
	
	
	function setRmUseJs($rm, $type){ // 1=use by kassa, 2 = use by other
		Yii::import('application.models.*'); 
		$model = Dataindukpasien::model()->with(array('user_rel'))->findByAttributes(array(
					'NomorRM'=>$rm,
				 )); 
		$data = array(); 
		if($model != null){  
			$model->last_use_time = date('Y-m-d H:i:s');
			$model->expired_use_time = date('Y-m-d H:i:s a', time() + 15); 
			$model->last_ip = Yii::app()->session['ip'];
			$model->save(false);
			$data['status'] = true;
			return $data; 	
		}		
	}
	 
	/* function setNullData($data){
		foreach($data as $key=>$val){
			foreach($val as $key2=>$val2){
				$value = explode(':', $val2);
				$data[$key][$key2] = $value[0].':'; 
			}
		}
		return $data;
	
	}
	
	
	function setNullData2($data){
		foreach($data as $key=>$val){
			foreach($val as $key2=>$val2){
				$value = explode(':', $val2);
				$data[$key][$key2] = $value[0].';'; 
			}
		}
		return $data;
	
	} */
	
	
	function setNullData($data){
		foreach($data as $key=>$val){
			if($key == 'data'){
				foreach($val as $key2=>$val2){
					$value = explode(':', $val2);
					$data[$key][$key2] = $value[0].':'; 
				}
			} 
		}
		return $data;
	
	}
	
	
	function setNullData2($data){
		foreach($data as $key=>$val){
			if($key == 'data'){
				foreach($val as $key2=>$val2){
					$value = explode(';', $val2);
					$data[$key][$key2] = $value[0].';'; 
				}
			} 
		}
		return $data;
	
	}

	function is_between_times( $start = null, $end = null, $current = null) {
	    if ( $start == null ) $start = '00:00';
	    if ( $end == null ) $end = '23:59';
	    if ( $current == null ) $current = date('H:i');
	    
	    return ( $start <= $current && $current <= $end );
	}
	
	function setLogEdit($old, $new){
		$dataLogArr = array(
					'old'=>$old,
					'new'=>$new
				);
				
		$dataLogJson = json_encode($dataLogArr);
		
		$model = new AppLog;
		$model->id_kategori = 1;
		$model->tanggal = date('Y-m-d');
		$model->waktu = date('Y-m-d H:i:s');
		$model->user = Yii::app()->user->id;
		$model->data_log = $dataLogJson;
		$model->save(); 
		
	}
	
	function difDate($start, $end){
		$date1 = new DateTime($start);
		$date2 = new DateTime($end);
		$interval = $date1->diff($date2);
		// echo "difference " . $interval->days . " days ";
		// echo "difference " . $interval->y . " years, " . $interval->m." months, ".$interval->d." days ";
		return $interval;
	}
	 
}
