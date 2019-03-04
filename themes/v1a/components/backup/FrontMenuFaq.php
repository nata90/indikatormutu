<?php

class FrontMenuFaq extends CWidget
{

	public function run() {
		Yii::import('application.modules.faq.models.Faq');
		$menuParent = Faq::model()->findAll();
		$this->render('front_menu_faq', array(
			'menuParent'=>$menuParent,
		));	
	}
}
?>