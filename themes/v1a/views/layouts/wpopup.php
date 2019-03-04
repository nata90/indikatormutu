<?php 

if(!isset($_SESSION)){
	session_start();
}
/* if(!isset($_SESSION['SES_REG'])) {
    header("location:login.php");
} */
/* include("include/connect.php");
include("include/function.php");
include('include/phpMyBorder2.class.php'); 
$pmb = new PhpMyBorder(false); */
$cs = Yii::app()->getClientScript();
Yii::import('webroot.themes.'.Yii::app()->theme->name.'.components.*');
if(isset($_GET["link"])){
	$link = $_GET["link"];
}else{
	$link = "";
}
  //echo $link;
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title><?php //echo  ucwords($rstitle)?></title>

        <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->theme->baseUrl;?>/rajal/style.css"/>
        <link href="<?php echo Yii::app()->theme->baseUrl;?>/dq_sirs.css" type="text/css" rel="stylesheet" />
        <link rel="shortcut icon" href="<?php echo Yii::app()->theme->baseUrl;?>/rsud.ico" />
       <?php /*  <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->theme->baseUrl;?>/include/jquery.autocomplete.css" />
        <link rel="stylesheet" href="<?php echo Yii::app()->theme->baseUrl;?>/css/autosuggest_inquisitor.css" type="text/css" media="screen" charset="utf-8" /> */?>
        <link rel="stylesheet" href="<?php echo Yii::app()->theme->baseUrl;?>/css/form.css" type="text/css" media="screen" charset="utf-8" />

        <script type="text/javascript" language="javascript" src="<?php echo Yii::app()->theme->baseUrl;?>/js/highcharts.js"></script> 
        <?php /* <script type="text/javascript" language="javascript" src="<?php echo Yii::app()->theme->baseUrl;?>/js/plugins/ajaxupload.3.5.js"></script>  */ ?>


       <?php /*  <script language="javascript" type="text/javascript" src="<?php echo Yii::app()->theme->baseUrl;?>/rajal/functions.js"></script>
        <script language="javascript" type="text/javascript" src="<?php echo Yii::app()->theme->baseUrl;?>/rajal/xmlhttp.js"></script>
        <script type="text/javascript" language="javascript" src="<?php echo Yii::app()->theme->baseUrl;?>/include/ajaxrequest.js"></script> */?>
		<?php /* <script>
		var baseUrl=<?php echo Yii::app()->baseUrl;?>;
		</script> */?>
        <script type="text/javascript" src="<?php echo Yii::app()->theme->baseUrl;?>/include/js.js"></script> 
       <?php /*  <script language="javascript" src="<?php echo Yii::app()->theme->baseUrl;?>/include/cal2.js"></script> 
        <script language="javascript" src="<?php echo Yii::app()->theme->baseUrl;?>/include/cal_conf2.js"></script>*/?>
        <!-- JQUERY -->
       <?php /*  <script src="<?php echo Yii::app()->theme->baseUrl;?>/js/jquery-1.7.min.js" language="JavaScript" type="text/javascript"></script> */?>
       <?php /*  <script src="<?php echo Yii::app()->theme->baseUrl;?>/js/jquery.validate.js" language="JavaScript" type="text/javascript"></script> */ ?>
		
		<!-- WPOPOUP JS -->
      
        <?php $cs->registerScriptFile(Yii::app()->theme->baseUrl.'/js/custom-wpopup.js', CClientScript::POS_END); ?>
        <?php $cs->registerScriptFile(Yii::app()->theme->baseUrl.'/js/nominal.js', CClientScript::POS_END); ?>
        <?php $cs->registerScriptFile(Yii::app()->theme->baseUrl.'/js/plugins/ajaxupload.3.5.js', CClientScript::POS_END); ?>
        <?php //$cs->registerScriptFile(Yii::app()->theme->baseUrl.'/js/jquery.yiigridview.js', CClientScript::POS_END); ?>
		
		
        <?php /* <script src="<?php echo Yii::app()->theme->baseUrl;?>/js/jqclock_201.js" language="JavaScript" type="text/javascript"></script> */?>
       
        <!--
        <script type="text/javascript" src="include/scripts/prototype.lite.js"></script>
		<script src="include/prototype.js" type="text/javascript"></script>
        -->
        <!--Notifikasi-->
        <!--<script src="include/jquery.js" language="JavaScript" type="text/javascript"></script>-->
       <?php /*  <script src="<?php echo Yii::app()->theme->baseUrl;?>/include/notification.js" language="JavaScript" type="text/javascript"></script> */?>

        <!--autocomplete-->
        <!--<script type="text/javascript" src="include/jquery-1.2.6.pack.js"></script>-->
        <?php /* <script type='text/javascript' src='<?php echo Yii::app()->theme->baseUrl;?>/include/jquery.autocomplete.pack.js'></script>
        <script type="text/javascript" src="<?php echo Yii::app()->theme->baseUrl;?>/rajal/jscripts/nicEdit.js"></script> */?>



        <?php /* <link rel="stylesheet" href="<?php echo Yii::app()->theme->baseUrl;?>/css/autosuggest_inquisitor.css" type="text/css" media="screen" charset="utf-8" /> */?>

    </head>
    
	</HEAD>
	<!--<BODY onload="noBack();" onpageshow="if (event.persisted) noBack();" onunload="">-->
    

        <?php //include("notification.php"); ?>

		<div id="loading-page" class="se-pre-con" style="display: none;" ></div>
		<?php  $this->widget('FrontDialog');?>
        <div id="container_master_bg">
            <div id="container">
               	<div align="center" class="" id="wp-content">
					<?php echo $content;?>
				</div>
                <?php //include("switch.php"); ?>
            </div>
        </div>

        <?php /*  <script src="<?php echo Yii::app()->theme->baseUrl;?>/js/custom-wpopup.js" language="JavaScript" type="javascript"></script> */ ?>
    </body>
	
	
</html>