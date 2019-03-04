<?php

class FrontFooterSocial extends CWidget
{

	public function init() {
	}

	public function run() {
		$this->renderContent();
	}

	protected function renderContent() {
		//Yii::import('application.modules.links.models.CcnFooterLinks');
		/* model for search footer link contact details*/
		$model = ContactDetails::model()->find(array(
			'select'=>'id, facebook_address, twitter_address, google_plus, youtube',
			'condition'=>'id = 1',
		));
		$this->render('front_footer_social',array("model"=>$model));

	}
}
