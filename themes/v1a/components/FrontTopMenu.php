<?php

class FrontTopMenu extends CWidget
{

	public function run() {
		Yii::import('application.modules.app.models.*');
		// $model=new LoginForm;
		 
				$this->render('front_top_menu', array(
					'topMenu'=>null,
				));
				
			
		
		// 

		
		// $topMenu = AppMenu::model()->findAllByAttributes(array('id_position'=>1));
		// echo 'ASSSSSSSSSSSSSS';
		// exit();
		
		/* foreach($topMenu as $val){
			$topMenuList[] = $val->title; 
			
		} */
		
		// $this->render('front_top_menu_admin', array(
			// 'model'=>$model,
			// 'topMenu'=>$topMenu,
			// 'topMenuList'=>$topMenuList,
		// ));
			
	}
}
?>