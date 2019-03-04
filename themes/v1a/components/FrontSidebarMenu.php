<?php

class FrontSidebarMenu extends CWidget
{

	public function run() {
		
		Yii::import('application.modules.app.models.*');
		 
			$this->render('front_sidebar_menu_admin');	
		
	}
}
?>