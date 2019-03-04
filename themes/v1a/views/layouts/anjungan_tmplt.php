<?php
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
        <link href="<?php echo Yii::app()->theme->baseUrl;?>/img/favicon.ico" rel='shortcut icon'>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title><?php //echo  ucwords($rstitle)?></title>

        <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->theme->baseUrl;?>/rajal/style.css"/>
        <link href="<?php echo Yii::app()->theme->baseUrl;?>/dq_sirs_anjungan.css" type="text/css" rel="stylesheet" />
        <link rel="shortcut icon" href="<?php echo Yii::app()->theme->baseUrl;?>/rsud.ico" />
        <!-- <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->theme->baseUrl;?>/include/jquery.autocomplete.css" /> -->
        <link rel="stylesheet" href="<?php echo Yii::app()->theme->baseUrl;?>/css/autosuggest_inquisitor.css" type="text/css" media="screen" charset="utf-8" />
        <link rel="stylesheet" href="<?php echo Yii::app()->theme->baseUrl;?>/css/form.css" type="text/css" media="screen" charset="utf-8" />


        <!-- <script language="javascript" type="text/javascript" src="<?php echo Yii::app()->theme->baseUrl;?>/rajal/functions.js"></script>
        <script language="javascript" type="text/javascript" src="<?php echo Yii::app()->theme->baseUrl;?>/rajal/xmlhttp.js"></script>
        
        <script type="text/javascript" language="javascript" src="<?php echo Yii::app()->theme->baseUrl;?>/js/highcharts.js"></script>
        
       
        <script type="text/javascript" src="<?php echo Yii::app()->theme->baseUrl;?>/include/js.js"></script>
       
		<script src="<?php echo Yii::app()->theme->baseUrl;?>/js/custom-js.js" language="JavaScript" type="text/javascript"></script>
	    <script src="<?php echo Yii::app()->theme->baseUrl;?>/include/notification.js" language="JavaScript" type="text/javascript"></script> -->

        
        <link rel="stylesheet" href="<?php echo Yii::app()->theme->baseUrl;?>/css/autosuggest_inquisitor.css" type="text/css" media="screen" charset="utf-8" />
 


        <script src="<?php echo Yii::app()->theme->baseUrl;?>/numpad/js/jquery.min.js"></script>
        <!-- Bootstrap -->
        <link rel="stylesheet" href="<?php echo Yii::app()->theme->baseUrl;?>/numpad/css/bootstrap.min.css">
        <link rel="stylesheet" href="<?php echo Yii::app()->theme->baseUrl;?>/numpad/css/bootstrap-theme.min.css">
        <script src="<?php echo Yii::app()->theme->baseUrl;?>/numpad/js/bootstrap.min.js"></script>
        <!-- jQuery.NumPad -->
        <script src="<?php echo Yii::app()->theme->baseUrl;?>/numpad/js/jquery.numpad.js"></script>
        <link rel="stylesheet" href="<?php echo Yii::app()->theme->baseUrl;?>/numpad/css/jquery.numpad.css">
        <script src="<?php echo Yii::app()->theme->baseUrl;?>/numpad/js/anjungan.js" language="JavaScript" type="text/javascript"></script>

        <script type="text/javascript">
            // Set NumPad defaults for jQuery mobile. 
            // These defaults will be applied to all NumPads within this document!
            $.fn.numpad.defaults.gridTpl = '<table class="table modal-content"></table>';
            $.fn.numpad.defaults.backgroundTpl = '<div class="modal-backdrop in"></div>';
            $.fn.numpad.defaults.displayTpl = '<input type="text" class="form-control" />';
            $.fn.numpad.defaults.buttonNumberTpl =  '<button type="button" class="btn btn-default"></button>';
            $.fn.numpad.defaults.buttonFunctionTpl = '<button type="button" class="btn" style="width: 100%;"></button>';
            $.fn.numpad.defaults.onKeypadCreate = function(){$(this).find('.done').addClass('btn-primary');};
            
            // Instantiate NumPad once the page is ready to be shown
            $(document).ready(function(){
                $('#text-basic').numpad();
                $('#password').numpad({
                    displayTpl: '<input class="form-control" type="password" />',
                    hidePlusMinusButton: true,
                    hideDecimalButton: true 
                });
                $('#numpadButton-btn').numpad({
                    target: $('#numpadButton')
                });


                $('#numpadButton-btn2').numpad({
                    target: $('#numpadButton2')
                });

                $('#numpad4div').numpad();
                $('#numpad4column .qtyInput').numpad();
                
                $('#numpad4column tr').on('click', function(e){
                    $(this).find('.qtyInput').numpad('open');
                });
            });
        </script>
        <style type="text/css">
            .nmpd-grid {border: none; padding: 20px;}
            .nmpd-grid>tbody>tr>td {border: none;}
            
            /* Some custom styling for Bootstrap */
            .qtyInput {display: block;
              width: 100%;
              padding: 6px 12px;
              color: #555;
              background-color: white;
              border: 1px solid #ccc;
              border-radius: 4px;
              -webkit-box-shadow: inset 0 1px 1px rgba(0,0,0,.075);
              box-shadow: inset 0 1px 1px rgba(0,0,0,.075);
              -webkit-transition: border-color ease-in-out .15s,-webkit-box-shadow ease-in-out .15s;
              -o-transition: border-color ease-in-out .15s,box-shadow ease-in-out .15s;
              transition: border-color ease-in-out .15s,box-shadow ease-in-out .15s;
            }
        </style>

    </head>
    
	</HEAD>
	<!--<BODY onload="noBack();" onpageshow="if (event.persisted) noBack();" onunload="">-->
    

       
        <div id="header">
			<div id="bg_variation_home">
           
                <div id="logo">
                </div>
				<?php $this->widget('FrontInfoHeader');?>
            </div>
			
			<link href="<?php echo Yii::app()->theme->baseUrl;?>/css/dropdown/dropdown.css" media="all" rel="stylesheet" type="text/css" />
			<link href="<?php echo Yii::app()->theme->baseUrl;?>/css/dropdown/themes/default/default.css" media="all" rel="stylesheet" type="text/css" />
			<?php 
			if(!Yii::app()->user->isGuest){
				$this->widget('FrontTopMenu');
			}
			?>	
            
        </div>
        <div id="loading-page" class="se-pre-con" style="display: none;" ></div>
        <div id="loading-page2" class="se-pre-con2" style="display: none;" ></div>

        <div id="container_master_bg">
            <div id="container">
               	<div align="center" class="">
					<?php echo $content;?>
				</div>
                <?php //include("switch.php"); ?>
            </div>
        </div>

        <div align="center" id="footer">
            <div class="left"><?php //=$singrstitl?> <?php //=strtoupper($singhead1)?> Developed by ISIRS RSST</div>
            <div class="right"><?php //echo ucwords($rstitle)?> &copy; <?php echo date("Y"); ?>
            <?php 
			$timestamp = time();
			echo "<input id='servertime' type='hidden' value='".$timestamp."' />";
			echo "<input id='clockn' type='hidden' />";
			?>
            </div>
			<div>
			IP
			</div>
        </div>
    </body>
</html>
<?php //mysql_close($connect);?>