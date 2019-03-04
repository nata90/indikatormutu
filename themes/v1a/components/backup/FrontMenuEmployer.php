<?php

class FrontMenuEmployer extends CWidget
{

	public function run() {
		
		$model=new LoginForm;
		$this->render('front_menu_employer', array(
			'model'=>$model
		));	
	}
}
?>