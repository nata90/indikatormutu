<?php

class FrontMenuMember extends CWidget
{

	public function run() {
		Yii::import('application.modules.jobseeker.models.CcnUserUpgrade');
		Yii::import('application.modules.jobseeker.models.*');
		$idUser = Yii::app()->user->id_user;
		$grup = Yii::app()->user->id;
		if($grup != 3)
			$model = CcnJobseeker::model()->findByPk($idUser);
		else
			$model = CcnEmployer::model()->findByPk($idUser);
		
		$upgrade = CcnUserUpgrade::model()->find(array(
			'condition'=>'swt_user_id = :id',
			'params'=>array(':id'=>$idUser),
		));
		$this->render('front_menu_member', array(
			'idUser'=>$idUser,
			'model'=>$model,
			'upgrade'=>$upgrade,
		));	
	}
}
?>