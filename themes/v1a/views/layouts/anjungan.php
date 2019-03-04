<!DOCTYPE html>
<html>
<head>
	<title>Sistem Anjungan Mandiri - RSUP dr. Soeradji Tirtonegoro Klaten</title>
	<link rel="stylesheet" href="<?php echo Yii::app()->theme->baseUrl;?>/anjungan/css/bootstrap-theme.min.css" type="text/css">
	<link rel="stylesheet" href="<?php echo Yii::app()->theme->baseUrl;?>/anjungan/css/bootstrap.min.css" type="text/css">
	<link rel="stylesheet" href="<?php echo Yii::app()->theme->baseUrl;?>/anjungan/css/jquery.modal.min.css" type="text/css">
	<link rel="stylesheet" href="<?php echo Yii::app()->theme->baseUrl;?>/anjungan/css/style.css" type="text/css">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>

	<div class="container">
		<div class="row">
			<div class="header col-sm-12">
				<?php /* <div class="logo pull-left">
					<img src="../images/rsst.png" class="">
				</div> */ ?>
				<div class="pull-left">
					<h2><strong>SISTEM ANJUNGAN MANDIRI</strong></h2>
					<p>RSUP dr. Soeradji Tirtonegoro Klaten</p>
				</div>
			</div>
		</div>

		<div class="content">
			<div class="col-md-12">
				<?php /* <h3 class="subheader text-center">Selamat datang di Sistem Anjungan Mandiri - RSST</h3> */ ?>
				<!-- tabs -->
				<div class="tabbable">
					<ul class="nav nav-tabs">
						<li id="nav-1" class="active"><a href="#one" data-toggle="tab">Syarat & Ketentuan</a></li>
						<li id="nav-2"><a href="#two" data-toggle="tab">Daftar</a></li>
						<li id="nav-3"><a href="#twee" data-toggle="tab">Detail Pendaftaran</a></li>
					</ul>
					<div class="tab-content">
						<?php echo $content;?>
					</div>
				</div>
				<!-- /tabs -->
			</div>
		</div>

		<div class="row">
			<div class="footer col-sm-12">
				<p>Copyright © 2018. Instalasi SIRS - RSST</p>
			</div>
		</div>
	</div>

	<script src="<?php echo Yii::app()->theme->baseUrl;?>/anjungan/js/jquery-1.12.4.min.js"></script>
	<script src="<?php echo Yii::app()->theme->baseUrl;?>/anjungan/js/bootstrap.min.js"></script>
	<script src="<?php echo Yii::app()->theme->baseUrl;?>/anjungan/js/jquery.modal.min.js"></script>
	<script src="<?php echo Yii::app()->theme->baseUrl;?>/anjungan/js/anjungan.js"></script>
</body>
</html>