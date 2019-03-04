<?php
	$cs = Yii::app()->getClientScript();
	$url = Yii::app()->createUrl('site/login');
	$urlredirectJobs = Yii::app()->createUrl('jobseeker/site/index');
	$urlredirectEmp = Yii::app()->createUrl('employer/member/index');
	$urlErrorlogin = Yii::app()->createUrl('site/logindialog');
	$urlredirectCilacs = Yii::app()->createUrl('jobseeker/personaldevelopment/englishassessment');
$js=<<<EOP
EOP;
	$ukey = md5(uniqid(mt_rand(), true));
	$cs->registerScript($ukey, $js);
?>
<?php if(!Yii::app()->user->isGuest && Yii::app()->user->id_user != 212 && Yii::app()->user->id != 11) { ?>

<?php } else { ?>
	<div class="container clearfix">
		<?php /*Belum menjadi member <a href="<?php echo Yii::app()->createUrl('registertour/intro');?>" title="">daftar di sini !</a>*/?>
		Be a Jobseeker or Student Member <a href="<?php echo Yii::app()->createUrl('registertour/jobseeker');?>" title="">click here !</a>
		<div class="login">
			<?php
			$form=$this->beginWidget('CActiveForm', array(
				'id'=>'front-login-form',
				'action'=>Yii::app()->createUrl('site/login'),
				'enableAjaxValidation'=>false,	
			)); ?>
				<ul>
					<li><?php echo $form->textField($model,'email',array('placeholder'=>'Email / Username')); ?></li>
					<li><?php echo $form->passwordField($model,'password',array('placeholder'=>'Password')); ?></li>
					<li class="hidden"><?php echo $form->hiddenField($model,'typeLogin',array('value'=>1)); ?></li>
					<li>
						<a class="button" href="<?php echo Yii::app()->createUrl('registertour/jobseeker');?>" title="">register</a>
						<input id="login-front" type="button" value="Login">
					</li>
				</ul>
			<?php $this->endWidget(); ?>
			<div class="forgot">
				Lupa password ? 
				<i>Silahkan <a href="<?php echo Yii::app()->createUrl('site/forgotpassword');?>" title="lupa password">klik disini</a></i>
				<div class="clear"></div>
			</div>
		</div>
	</div>
<?php } ?>