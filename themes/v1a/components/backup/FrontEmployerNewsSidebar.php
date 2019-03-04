<?php

class FrontEmployerNewsSidebar extends CWidget
{

	public function run() {
		Yii::import('application.modules.careernews.models.CcnMemberNews');
		Yii::import('application.modules.news.models.CcnContent');
		$model = CcnMemberNews::model()->findAll(array(
			'select'	=> 't.content_id',
			'condition'	=> 't.user_group_id = '.Yii::app()->user->id,
			'with'		=> array(
				'content'	=> array(
					'alias'		=> 'c',
					'select'	=> 'c.title',
					'condition'	=> 'c.published = 1'
				)
			),
			'limit'		=> 3,
			'order'		=> 't.id DESC'
		));
		$this->render('front_employer_news_sidebar', array('model'=>$model));	
	}
}
?>