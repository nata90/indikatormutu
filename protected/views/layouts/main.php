<?php /* @var $this Controller */ ?>
<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<meta name="language" content="en">

	<!-- blueprint CSS framework -->
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/screen.css" media="screen, projection">
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/print.css" media="print">
	<!--[if lt IE 8]>
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/ie.css" media="screen, projection">
	<![endif]-->

	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/main.css">
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/form.css">

	<title><?php echo CHtml::encode($this->pageTitle); ?></title>
</head>

<body>

<div class="container" id="page">

	<div id="header">
		<div id="logo"><?php echo CHtml::encode(Yii::app()->name); ?></div>
	</div><!-- header -->

	<!--
	<div id="mainmenu">
		<?php /* $this->widget('zii.widgets.CMenu',array(
			'items'=>array(
				array('label'=>'Home', 'url'=>array('/site/index')),
				array('label'=>'Rekap Harian', 'url'=>array('/rekapvariabelharian/create')),
				array('label'=>'Rekap Bulanan', 'url'=>array('/rekapvariabelbulanan/create')),
				array('label'=>'Login', 'url'=>array('/site/login'), 'visible'=>Yii::app()->user->isGuest),
				array('label'=>'Logout ('.Yii::app()->user->name.')', 'url'=>array('/site/logout'), 'visible'=>!Yii::app()->user->isGuest)
			),
		)); */ ?>
	</div> mainmenu -->
	<div>
	<?php
	
	$this->widget('ext.CDropDownMenu.CDropDownMenu',array(
			'style' => 'default', // or default or navbar
      'items'=>array(
				array(
					'label'=>Yii::t('Login'),
					'url'=>array('//user/user/login'),
					'visible'=>Yii::app()->user->isGuest,
					), 
				array(
					'label'=>Yii::t('Register'),
					'url'=>array('//registration/registration/registration'),
					'visible'=>Yii::app()->user->isGuest,
					), 
				array(
					'label'=>Yii::t('Demo'),
					'url'=>array('//demo/index'),
					'visible'=>Yii::app()->user->isGuest,
					), 
				array(
					'label'=>Yii::t('Demo'),
					'visible'=>!Yii::app()->user->isGuest,
					'items' => array(
						array(
							'label'=>Yii::t('Browse demos'),
							'url'=>array('//demo/index'),
							), 
						array(
							'label'=>Yii::t('Create new Demo'),
							'url'=>array('//demo/create'),
							), 
						array(
							'label'=>Yii::t('Demos'),
							'url'=>array('//demo/index', 'owner' => true),
							), 
	),
				array('label'=>'Logout ('.Yii::app()->user->name.')',
						'url'=>array('/site/logout'),
						'visible'=>!Yii::app()->user->isGuest)
					)
    ) 
)
);
	
	?>
	</div>
	
	<?php if(isset($this->breadcrumbs)):?>
		<?php $this->widget('zii.widgets.CBreadcrumbs', array(
			'links'=>$this->breadcrumbs,
		)); ?><!-- breadcrumbs -->
	<?php endif?>

	<?php echo $content; ?>

	<div class="clear"></div>

	<div id="footer">
		Copyright &copy; <?php echo date('Y'); ?> by My Company.<br/>
		All Rights Reserved.<br/>
		<?php echo Yii::powered(); ?>
	</div><!-- footer -->

</div><!-- page -->

</body>
</html>
