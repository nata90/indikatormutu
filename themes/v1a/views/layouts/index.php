<?php //session_start();
/* if(!isset($_SESSION['SES_REG'])) {
    header("location:login.php");
} */
/* include("include/connect.php");
include("include/function.php");
include('include/phpMyBorder2.class.php'); 
$pmb = new PhpMyBorder(false); */

use Neodynamic\SDK\Web\WebClientPrint;
$cs = Yii::app()->getClientScript();

	$cs->registerCoreScript('jquery', CClientScript::POS_END);
	$cs->registerCoreScript('jquery.ui', CClientScript::POS_END);
	// $cs->registerScriptFile(Yii::app()->theme->baseUrl.'/js/plugin/jquery.address-1.5.min.js', CClientScript::POS_END);
	// $cs->registerScriptFile(Yii::app()->theme->baseUrl.'/js/plugin/jquery.easing.1.3.js', CClientScript::POS_END);
	// $cs->registerScriptFile(Yii::app()->theme->baseUrl.'/js/plugin/jquery.nicescroll.min.js', CClientScript::POS_END);
	// $cs->registerScriptFile(Yii::app()->theme->baseUrl.'/js/plugin/jquery.scrollTo.1.4.3.1-min.js', CClientScript::POS_END);
	// $cs->registerScriptFile(Yii::app()->theme->baseUrl.'/js/plugin/jquery.ba-outside-events.js', CClientScript::POS_END);
	// $cs->registerScriptFile(Yii::app()->theme->baseUrl.'/js/plugin/jquery.cicle.min.js', CClientScript::POS_END);
	// $cs->registerScriptFile(Yii::app()->theme->baseUrl.'/js/plugin/jquery-1.7.1.min.js', CClientScript::POS_END);
	/* uncomment when gf */

Yii::import('webroot.themes.'.Yii::app()->theme->name.'.components.*');

if(isset($_GET["link"])){
	$link = $_GET["link"];
}else{
	$link = "";
}
  //echo $link;
//echo Yii::app()->getSession()->getTimeout();
/* $this->widget('ext.timeout-dialog.ETimeoutDialog', array(
    // Get timeout settings from session settings.
    'timeout' => Yii::app()->getSession()->getTimeout(),
    // Uncomment to test.
    // Dialog should appear 20 sec after page load.
    //'countdown'=>'Waktu Login anda akan segera habis !',
    //'timeout' => 60,
    'title'=>'Waktu Login anda akan segera habis !',
    'message'=>'Anda akan logout otomatis dalam {0} detik',
    'question'=>'Apakah anda akan tetap SIGN IN ?',
    'keep_alive_url' => $this->createUrl('/site/keepalive'),
    'logout_redirect_url' => $this->createUrl('/site/logout'),
    'keep_alive_button_text'=>'Ya, tetap SIGN IN !',
    'sign_out_button_text'=>'Tidak, saya ingin keluar'
));
 */
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <link href="<?php echo Yii::app()->theme->baseUrl;?>/img/favicon.ico" rel='shortcut icon'>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title><?php //echo ucwords($rstitle)?></title>
		
        <?php /* <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->theme->baseUrl;?>/rajal/style.css"/> */ ?>
        <link href="<?php echo Yii::app()->theme->baseUrl;?>/dq_sirs.css" type="text/css" rel="stylesheet" />
        <link rel="shortcut icon" href="<?php echo Yii::app()->theme->baseUrl;?>/rsud.ico" />
        <?php /* <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->theme->baseUrl;?>/include/jquery.autocomplete.css" />
        <link rel="stylesheet" href="<?php echo Yii::app()->theme->baseUrl;?>/css/autosuggest_inquisitor.css" type="text/css" media="screen" charset="utf-8" /> */?>
		<link rel="stylesheet" href="<?php echo Yii::app()->theme->baseUrl;?>/css/form.css" type="text/css" media="screen" charset="utf-8" />
		
		<?php /* <script src="http://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.2/modernizr.js"></script> */?>

        <?php /* <script language="javascript" type="text/javascript" src="<?php echo Yii::app()->theme->baseUrl;?>/rajal/functions.js"></script>
        <script language="javascript" type="text/javascript" src="<?php echo Yii::app()->theme->baseUrl;?>/rajal/xmlhttp.js"></script>
        <script type="text/javascript" language="javascript" src="<?php echo Yii::app()->theme->baseUrl;?>/include/ajaxrequest.js"></script>
       
        <script type="text/javascript" src="<?php echo Yii::app()->theme->baseUrl;?>/include/js.js"></script> */ ?>
       <?php /*  <script language="javascript" src="<?php echo Yii::app()->theme->baseUrl;?>/include/cal2.js"></script> 
        <script language="javascript" src="<?php echo Yii::app()->theme->baseUrl;?>/include/cal_conf2.js"></script>*/?>
        <!-- JQUERY -->
		<?php /* <script src="<?php echo Yii::app()->theme->baseUrl;?>/js/jquery-1.7.min.js" language="JavaScript" type="text/javascript"></script> 
			*///SAYA KOMENT SOALNYA ERROR PADA FORM SEARCH
		?>      
       <?php /*  <script src="<?php echo Yii::app()->theme->baseUrl;?>/js/jquery.validate.js" language="JavaScript" type="text/javascript"></script>*/?>
        <script src="<?php echo Yii::app()->theme->baseUrl;?>/js/custom-js.js" language="JavaScript" type="text/javascript"></script>
        <script type="text/javascript" language="javascript" src="<?php echo Yii::app()->theme->baseUrl;?>/js/highcharts.js"></script> 
        <?php $cs->registerScriptFile(Yii::app()->theme->baseUrl.'/js/nominal.js', CClientScript::POS_END); ?>
        <?php $cs->registerScriptFile(Yii::app()->theme->baseUrl.'/js/plugins/ajaxupload.3.5.js', CClientScript::POS_END); ?>
        <?php /* <script src="<?php echo Yii::app()->theme->baseUrl;?>/js/jqclock_201.js" language="JavaScript" type="text/javascript"></script>
        <script type="text/javascript">
			jQuery.noConflict();
		</script> */?>
        <!--
        <script type="text/javascript" src="include/scripts/prototype.lite.js"></script>
		<script src="include/prototype.js" type="text/javascript"></script>
        -->
        <!--Notifikasi-->
        <!--<script src="include/jquery.js" language="JavaScript" type="text/javascript"></script>-->
        <?php /* <script src="<?php echo Yii::app()->theme->baseUrl;?>/include/notification.js" language="JavaScript" type="text/javascript"></script> */?>

        <!--autocomplete-->
        <!--<script type="text/javascript" src="include/jquery-1.2.6.pack.js"></script>-->
        <?php /* <script type='text/javascript' src='<?php echo Yii::app()->theme->baseUrl;?>/include/jquery.autocomplete.pack.js'></script> 
        <script type="text/javascript" src="<?php echo Yii::app()->theme->baseUrl;?>/rajal/jscripts/nicEdit.js"></script>*/ ?>


       <?php  /*  <script type="text/javascript">
            bkLib.onDomLoaded(function() { nicEditors.allTextAreas() });
        </script>

       <script type="text/javascript">
            function init(){
                var stretchers = document.getElementsByClassName('box');
                var toggles = document.getElementsByClassName('tab');
                var myAccordion = new fx.Accordion(
                toggles, stretchers, {opacity: false, height: true, duration: 600}
            );
                //hash functions
                var found = false;
                toggles.each(function(h3, i){
                    var div = Element.find(h3, 'nextSibling');
                    if (window.location.href.indexOf(h3.title) > 0) {
                        myAccordion.showThisHideOpen(div);
                        found = true;
                    }
                });
                if (!found) myAccordion.showThisHideOpen(stretchers[0]);
            }


            function jumpTo (link)
            {
                var new_url=link;
                if (  (new_url != "")  &&  (new_url != null)  )
                    window.location=new_url;
            }
        </script> */?>

        <!-- admission pasien-->
       <?php /*  <script type="text/javascript">
            jQuery(document).ready(function() {
                //pendaftaran
                //$("#NAMA").autocomplete("include/scripts/auto_nama.php", { width: 260, selectFirst: true });
                <!-- OK-->
                jQuery("#nomroperasi").autocomplete("operasi/nomroperasi.php",{width:260});
                <!-- VK-->
                jQuery("#icdv").autocomplete("vk/autocomplete_vk.php",{width:260});
                <!-- Rawat Inap-->
                jQuery("#namaobat1").autocomplete("ranap/auto_icd.php",{width:260});
            });
        </script> */?>

        <!--auto refresh jumlah pasien-->
        <?php /* <script type="text/javascript">
            var auto_refresh = setInterval(
            function ()
            {
                jQuery('#totalpasienhariini').load('admission/jmlpasien.php').fadeIn("slow");
            }, 5000); // refresh every 10000 milliseconds
        </script> */ ?>
        <!--auto refresh jumlah pasien-->



        <?php /* <script type="text/javascript">
            function enter_pressed(e){
                var keycode;
                if (window.event) keycode = window.event.keyCode;
                else if (e) keycode = e.which;
                else return false;
                return (keycode == 13);
            }

        </script>
        <script type="text/javascript" src="<?php echo Yii::app()->theme->baseUrl;?>/js/bsn.AutoSuggest_c_2.0.js"></script>
        <script>
					//					var today;
					//jQuery(document).ready(function(){
						//jQuery("#clock4").clock({"format":"24","calendar":"false"});
						//servertime = parseFloat( jQuery("#servertime").val() ) * 1000;
						//jQuery("#clockn").clock({"format":"24","calendar":"false"});
						//jQuery.data = function(success){
						//	jQuery.get("http://json-time.appspot.com/time.json?callback=?", function(response){
						//		success(new Date(response.datetime));
						//	}, "json");
						//};
					//});
					/*
					function update(){
						var start = new Date("March 25, 2011 17:00:00");
						//var today = new Date();
						jQuery.data(function(time){
							today = time;
						});
						var bla = today.getTime() - start.getTime();
						jQuery("#milliseconds").text(bla);
					}
			 
					//setInterval("update()", 1);

		</script> */?>
        <?php /* <link rel="stylesheet" href="<?php echo Yii::app()->theme->baseUrl;?>/css/autosuggest_inquisitor.css" type="text/css" media="screen" charset="utf-8" />  */?>

    </head>
    
	</HEAD>
	<body>
	<!--<BODY onload="noBack();" onpageshow="if (event.persisted) noBack();" onunload="">-->
    

        <?php //include("notification.php"); ?>
        <div id="header">
            <div id="bg_variation"> 
                <div id="logo">
                </div>
                <?php //$this->widget('FrontInfoHeader');;?>
            </div>
			<link href="<?php echo Yii::app()->theme->baseUrl;?>/css/dropdown/dropdown.css" media="all" rel="stylesheet" type="text/css" />
			<link href="<?php echo Yii::app()->theme->baseUrl;?>/css/dropdown/themes/default/default.css" media="all" rel="stylesheet" type="text/css" />
           <?php 
				// $this->widget('FrontTopMenu')
			?>
        </div>

		<div id="loading-page" class="se-pre-con" style="display: none;" ></div>
		<div id="loading-page2" class="se-pre-con2" style="display: none;" ></div>
		<?php /* <div id="loading-page" class="se-pre-con" ></div> */ ?>
		
		
		<?php  $this->widget('FrontDialog');?>
        <div id="container_master_bg" >
            <div id="container">
            
                <?php 
                    $this->widget('FrontTopMenu')
                ?>
               	<div align="" class="horizontal">
					<div id="sidebar_menu">
					<?php 
						$this->widget('FrontSidebarMenu')
					?>
						<?php /* <ul id="" class="list_menu">
							<li><a class="dir" href="<?php echo Yii::app()->createUrl('site/login');?>">Login</a>
								
							</li>
							<li><a class="dir" href="#">MASTER</a>
								<ul>
									<li><a href="index.php?link=add_user">ADD USER</a></li>
									<li><a href="index.php?link=private">LIST USER</a></li>
									<li><a href="?link=191">EDIT ICD</a></li>
									<li><a href="?link=19">LIST ICD</a></li>
									<li><a href="index.php?link=jdoc2">ADD JADWAL</a></li>
									<li><a href="index.php?link=jdoc3">LIST JADWAL</a></li>
								</ul>
							</li>
						</ul> */?>
					</div>
					<?php echo $content;?>
				</div>
                <?php //include("switch.php"); ?>
            </div>
        </div>
		
		

        <div align="center" id="footer">
            <div class="left"><?php //=$singrstitl?> <?php //=strtoupper($singhead1)?> Developed by ISIRS RSST</div>
            <div class="right"><?php // echo  ucwords($rstitle)?> &copy; <?php echo date("Y"); ?>
			
            <?php 
			$timestamp = time();
			echo "<input id='servertime' type='hidden' value='".$timestamp."' />";
			echo "<input id='clockn' type='hidden' />";
			?>
            </div>
			
        </div>
		
			<input type="hidden" id="sid" name="sid" value="<?php echo session_id(); ?>" />
			
			<?php 
			$linkRmUse = Yii::app()->createUrl('dataindukpasien/ajaxrmuse');
			?>
			<script type="text/javascript">
				// var linkRmUse = <?php echo $a;?>;
				var linkRmUse = <?php echo json_encode($linkRmUse, JSON_HEX_TAG); ?>;
				var wcppGetPrintersDelay_ms = 5000; //5 sec

			</script>
			

    </body>
</html>
<?php // mysql_close($connect);?>