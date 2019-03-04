<!DOCTYPE html>
<html lang="en-US">
<head>

	<!-- Meta tags & title /-->
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<meta name="robots" content="all,index,follow" />

	<title>Speakers - Free Meet the Team Section Tutorial</title>
	<meta name="description" content="Speakers - Free Meet the Team Section Tutorial" />
	
	<!-- Stylesheets /-->
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->theme->baseUrl;?>/team/css/style.css" /> <!-- Main stylesheet /-->
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->theme->baseUrl;?>/team/css/bootstrap.css"> <!-- Grid framework /-->
	
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->theme->baseUrl;?>/team/css/1.css"> <!-- Grid framework /-->
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->theme->baseUrl;?>/team/css/2.css"> <!-- Grid framework /-->
	<link rel="stylesheet"   href="<?php echo Yii::app()->theme->baseUrl;?>/team/css/3.css"> <!-- Grid framework /-->
	
 <?php /*   <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700,800' rel='stylesheet' type='text/css'> <!-- Open Sans /-->
    <link href='http://fonts.googleapis.com/css?family=PT+Sans+Narrow:400,700' rel='stylesheet' type='text/css'> <!-- PT Sans Narrow /-->
	<link href="//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css" rel="stylesheet"> <!-- Font Awesome /-->  */?>
	
	<link rel="shortcut icon" href="<?php echo Yii::app()->theme->baseUrl;?>/team/img/favicon.png" type="image/x-icon" /> <!-- Favicon /-->

</head>

<body>

	<!-- SPEAKERS SECTION -->

	
	<section id="speakers">
		<h3>SINERGIS TEAM</h3> <!-- Section Title -->
		<div class="separator"></div>
		<div class="container">
			<?php echo $content;?>	
			 
				
			 	<!-- End Second Row -->	
			<div class="clear"></div> 	
		</div>
	</section>
	<!-- //SPEAKERS SECTION -->	

	<?php /* <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script> <!-- Load jQuery --> */ ?>
	<script src="<?php echo Yii::app()->theme->baseUrl;?>/team/css/jquery.js"></script> <!-- Load jQuery -->

	<!-- jQuery Code for the View All Button -->
	<script>
		$(document).ready(function(){
		  $(".fadeIn").click(function(){
			$("div.row2").fadeIn();
			$("button.fadeIn").hide();
		  });
		});
	</script>
	
</body>
</html>	