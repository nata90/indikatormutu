<?php

class FrontLoginEmployer extends CWidget
{

	public function run() {
		
		$model=new LoginForm;
		$this->render('front_login_employer', array(
			'model'=>$model
		));	
	}
}
?>