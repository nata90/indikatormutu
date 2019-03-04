<?php

class FrontMenuProfPic extends CWidget
{

	public function run() {
		Yii::import('application.modules.jobseeker.models.CcnJobseeker');
		Yii::import('application.modules.jobseeker.models.CcnJobseekerBio');
		Yii::import('application.modules.employer.models.*');
		$idUser = Yii::app()->user->id_user;
		$grup = Yii::app()->user->id;
		
		if($grup != 3)
			$model = CcnJobseeker::model()->findByPk($idUser);
		else
			$model = CcnEmployer::model()->findByPk($idUser);
		
		$this->render('front_menu_prof_pic', array(
			'idUser'=>$idUser,
			'model'=>$model,
			'grup'=>$grup,
		));	
	}
}
?>