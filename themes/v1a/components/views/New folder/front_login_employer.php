<?php
	$cs = Yii::app()->getClientScript();
	$url = Yii::app()->createUrl('site/login');
	$urlredirectJobs = Yii::app()->createUrl('jobseeker/site/index');
	$urlredirectEmp = Yii::app()->createUrl('employer/member/index');
	$urlErrorlogin = Yii::app()->createUrl('site/logindialog');
	$urlredirectCilacs = Yii::app()->createUrl('jobseeker/personaldevelopment/englishassessment');
$js=<<<EOP
	$('#front-login-employer').live('click', function(){
		$('.login').fadeIn();
		$('.login-pre').fadeOut();
	});
EOP;
	$ukey = md5(uniqid(mt_rand(), true));
	$cs->registerScript($ukey, $js);
?>
<div class="container clearfix">
	<?php /*Post a Job, <a href="<?php echo Yii::app()->createUrl('registertour/intro');?>" title="">Click Here !</a> */ ?>
	Guest Book, <a href="<?php echo Yii::app()->createUrl('employer/site/guestbook');?>" title="">Click Here !</a>
	<?php if(!Yii::app()->user->isGuest && Yii::app()->user->id_user != 212 && Yii::app()->user->id != 11) { ?>
		
	<?php } else { ?>
		<div class="login-pre">
			<ul>
				<li class="center"><input id="front-login-employer" type="button" value="Login Company" style="width: 100%; margin: 25% 0 0 0;"></li>
			</ul>
		</div>
		<div class="login" style="display:none;">
			<?php
			$form=$this->beginWidget('CActiveForm', array(
				'id'=>'front-login-form-employer',
				'action'=>Yii::app()->createUrl('site/login'),
				'enableAjaxValidation'=>false,	
			)); ?>
				
				<ul>
					<li><?php echo $form->textField($model,'email',array('placeholder'=>'Email / Username')); ?></li>
					<li><?php echo $form->passwordField($model,'password',array('placeholder'=>'Password')); ?></li>
					<li class="hidden"><?php echo $form->hiddenField($model,'typeLogin',array('value'=>0)); ?></li>
					<li class="center">
						<?php /* <a class="button" href="<?php echo Yii::app()->createUrl('registertour/intro');?>" title="">register</a>*/?>
						<input id="login-front" type="button" value="Login">
					</li>
				</ul>
			<?php $this->endWidget(); ?>
			<div class="forgot">
				Forgot Password ? 
				<i>Please <a href="<?php echo Yii::app()->createUrl('site/forgotpassword');?>" title="Forgot Password">Click Here!</a></i>
				<div class="clear"></div>
			</div>
		</div>
	<?php } ?>
</div>