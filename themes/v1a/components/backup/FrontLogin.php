<?php

class FrontLogin extends CWidget
{

	public function run() {
		
		$model=new LoginForm;
		$this->render('front_login', array(
			'model'=>$model
		));	
	}
}
?>