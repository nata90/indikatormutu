<?php

class FrontMenuJobseeker extends CWidget
{
	public function run() {
		Yii::import('application.modules.vacancy.models.CcnSubscribeVacancyJobseeker');
		Yii::import('application.modules.vacancy.models.CcnEmployerVacancy');
		Yii::import('application.modules.careerconsultation.models.CcnConsultationCareerOut');
		Yii::import('application.modules.careerconsultation.models.CcnConsultationCareerIn');
		Yii::import('application.modules.event.models.CcnCalendarEvent');
		Yii::import('application.modules.event.models.CcnFridayIndepth');
		Yii::import('application.modules.event.models.CcnEventSpecial');
		/* $userId = Yii::app()->user->id_user;
		$countTestCall	= CcnNotificationTestCall::model()->count('swt_users_id = '.$userId.' AND is_seen = "0"');
		$countMemberNews = CcnNotificationMemberNews::model()->count('swt_users_id = '.$userId.' AND is_seen = "0" AND publish_date < NOW()');
		
		$criteria = new CDbCriteria;
		$criteria->condition = 't.start_date <= NOW()';
		$criteria->order = 't.start_date DESC';
		$criteria->compare('t.swt_users_id', $userId);
		$criteria->compare('t.is_seen', '0');
		$criteria->join = 'LEFT JOIN ccn_employer_vacancy v ON (t.vacancy_id = v.id)';
		$criteria->compare('v.is_closed', 0);
		$countSubscription = CcnNotificationSubscription::model()->count($criteria); */
		
		/*
		$counselingCheck	= CcnNotificationCount::model()->find('swt_users_id = '.Yii::app()->user->id_user.' AND category = "counseling" AND count_date >= CURDATE()');
		if ($counselingCheck == null) {
			$countCareerCounseling	= CcnConsultationCareerOut::model()->count(array(
				'with'	=> array(
					'consultation_career_in' => array(
						'alias'	=> 'i',
						'condition'	=> 'i.`user_id` = :id'
					)
				),
				'condition' => 't.`id` NOT IN (
					SELECT pk_id
					FROM ccn_notification_readed
					WHERE category = "counseling" AND user_id = :id
				)',
				'params'	=> array(':id' => Yii::app()->user->id_user)
			));
			$notif[$i]['category']	= 'counseling';
			$notif[$i]['total']		= $countCareerCounseling;
			$i++;
		} else
			$countCareerCounseling = $counselingCheck->total;
		
		$j = 0;
		if (count($notif) > 0) {
			foreach ($notif as $val) {
				$model					= new CcnNotificationCount;
				$model->swt_users_id	= Yii::app()->user->id_user;
				$model->category		= $val['category'];
				$model->total			= $val['total'];
				$model->save();
			}
		} */
		//$countTestCall			= 0;
		//$countSubscription		= 0;
		/* $countFridayIndepth		= CcnCalendarEvent::model()->count('t.`type` = 5 AND t.`published` = 1 AND t.`start_time` >= NOW() AND t.`id` NOT IN (
			SELECT i.`event_id` FROM ccn_notification_friday_indepth i WHERE i.`swt_users_id` = '.Yii::app()->user->id_user.'
		)');
		$countSpecialEvent	= CcnEventSpecial::model()->count('t.`date_start` >= NOW() AND t.`id` NOT IN (
			SELECT n.`event_id` FROM ccn_notification_special_event n WHERE n.`swt_users_id` = '.Yii::app()->user->id_user.'
		)');
		
		$total = $countTestCall + $countSubscription + $countMemberNews + $countFridayIndepth + $countSpecialEvent; */
		
		$this->render('front_menu_jobseeker', array(
			'countTestCall'		=> $countTestCall,
			'countSubscription'	=> $countSubscription,
			'countMemberNews'	=> $countMemberNews,
			'countFridayIndepth'	=> $countFridayIndepth,
			'countSpecialEvent'	=> $countSpecialEvent,
			'total'				=> $total
		));	
	}
}

?>