<?php

class FrontInfoHeader extends CWidget
{

	public function run() {
		Yii::import('application.modules.app.models.*');
		// $model=new LoginForm;
		//$idGroup = Yii::app()->user->idgroup; 
		/* $topMenu = AppMenu::model()->findAll(array(
					'with'=>array('appMenuForGroups'),
					'condition'=>'id_position=1 AND appMenuForGroups.id_group ='.$idGroup, 
				)); */
		$this->render('front_info_header', array(
			// 'topMenu'=>$topMenu,
		));
	
	}
}
?>