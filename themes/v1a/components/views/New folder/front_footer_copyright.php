<?php //begin.Copyright 
	//Yii::import('webroot.themes.'.Yii::app()->theme->name.'.components.*');
	$module = strtolower(Yii::app()->controller->module->id);
?>
<div class="copyright">    
	<div class="container clearfix">
		<?php //begin.Content ?>
		<div class="content">Copyright &copy; 2010. <a href="http://ecc.ft.ugm.ac.id" title="ECC UGM">ECC UGM</a>. All Rights Reserved.<?php echo isset(Yii::app()->session['user_agent_smartphone'])?'<br/><a href="'.Yii::app()->createUrl('site/index/?m=1').'" off_address="" title="ECC UGM">Change To Mobile</a>':'';?></div>
        <?php if ($module != 'tracerstudy') { ?>
        	<a class="sitemap" off_address="" href="javascript:void(0);" title="Sitemap">Sitemap</a>
       		<a off_address="" class="right mr-25" href="<?php echo Yii::app()->createUrl('finance/site/confirm')?>" title="Konfirmasi pembayaran untuk keanggotaan ECC, Softskill Training dan Oflline Counseling">Konfirmasi Pembayaran</a>
        <?php } ?>
		<?php //end.Content ?>
        
        <?php //start google analytic
        $hosts = array(
            'localhost',
            '192.168.3.250',
            '127.0.0.1',
        );
        $server = trim($_SERVER['HTTP_HOST']);
        if(!in_array($server, $hosts)) {
        ?>
        <script type="text/javascript">
          var _gaq = _gaq || [];
          _gaq.push(['_setAccount', 'UA-21034407-1']);
          _gaq.push(['_trackPageview']);

          (function() {
            var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
            ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
            var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
          })();
        </script>
        <?php
        } //end google analytic
        ?>
	</div>
</div>
<?php //end.Copyright ?>
