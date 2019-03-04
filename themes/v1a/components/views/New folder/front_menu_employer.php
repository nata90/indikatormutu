<?php
	$module = strtolower(Yii::app()->controller->module->id);
	$current = strtolower(Yii::app()->controller->id.'/'.Yii::app()->controller->action->id);
	$controller = strtolower(Yii::app()->controller->id);
	$action = strtolower(Yii::app()->controller->action->id);
	Yii::import('application.modules.event.models.*');
	Yii::import('application.modules.careernews.models.CcnMemberNews');
	
	/*criteria for notification member news*/
	$criteria = new CDbCriteria;
	$criteria->alias = "a";
	$criteria->join = "LEFT JOIN swt_content AS b ON a.`content_id` = b.`id`";
	$criteria->addCondition("a.`user_group_id` = 3");
	$criteria->addCondition("content_id NOT IN (SELECT pk_id FROM `ccn_notification_readed` WHERE user_id = :uid AND category = 'member_news')");
	$criteria->params = array(":uid"=>Yii::app()->user->id_user);
	/*end criteria notif member news*/
	$countEmployerNews = CcnMemberNews::model()->count($criteria);
	
	/*criteria for notification fridayIndepth*/
	$criteria2 = new CDBCriteria;
	$criteria2->addCondition("date(event_date) > curdate()");
	$criteria2->addCondition("event_id NOT IN(SELECT pk_id FROM ccn_notification_readed WHERE user_id = :id AND category = 'fi_employer')");
	$criteria2->params = array(":id"=>Yii::app()->user->id_user);
	/*end criteria notif FI*/
	
	$countFI = CcnFridayIndepthEvent::model()->count($criteria2);
	$total = $countEmployerNews + $countFI;
	$cs = Yii::app()->getClientScript();
	
?>


<div class="jobseeker-menu">
    <div class="container clearfix">
        <ul>
			<li id="notif"><a off_address="" href="javascript:void(0);" id="notification" title="Notifikasi" class="<?php if($module == 'employer' && $current == 'site/notification ') {?> active<?php }?>"><?php echo $total!=0?"<span>$total</span>":"";?></a>
			
			<ul class="notification">
				<li>
					<span>Semua Notifikasi</span>
					<?php echo $total; ?>
				</li>
				<li>
					<a off_address="" href="<?php echo Yii::app()->createUrl('employer/site/notification/type/friday-indepth');?>">
						<span>Friday Indepth</span>
						<?php echo $countFI;?>
					</a>
				</li>
				<li>
					<a off_address="" href="<?php echo Yii::app()->createUrl('employer/site/notification/type/employer-news');?>">
						<span>Berita Employer</span>
						<?php echo $countEmployerNews;?>
					</a>
				</li>
				<li>
					<a off_address="" href="<?php echo Yii::app()->createUrl('employer/site/notification');?>">Lihat Semua</a>
				</li>
			</ul>
				<?/* <table>
					<tr>
						<th>Semua Notifikasi</th>
						<th><?php echo $total;?></th>
					</tr>
					<tr id="friday-indepth">
						<td>Friday Indepth</td>
						<td><?php echo $countFI;?></td>
					</tr>
					<tr id="employer-news">
						<td>Berita Employer</td>
						<td><?php echo $countEmployerNews;?></td>
					</tr>
					<tr>
						<td colspan="2"><a href="<?php echo Yii::app()->createUrl('jobseeker/site/notification');?>">Lihat Semua</a></td>
					</tr>
				</table> */?>
			</li>
			<?php /* <li><a href="<?php echo Yii::app()->createUrl('employer/member/index');?>" title="Headquarter" class="link-ajax <?php if($module == 'employer' && $current == 'member/index') {?> active<?php }?>">Headquarter</a></li> */?>
            <li><a off_address="" href="<?php echo Yii::app()->createUrl('employer/member/index');?>" title="Headquarter" class="link-ajax <?php if($module == 'employer' && $current == 'member/index') {?> active<?php }?>">Headquarter</a></li>

            <li>
				<a id="main-sub" off_address="" href="javascript:void(0);" title="Rekrutmen" class="<?php if($current == 'member/vacancylist' || $current == 'member/addvacancysimple' || $current == 'member/addvacancysingle' || $current == 'member/vacancyrecap' || $current == 'member/locationtest') {?> active<?php }?>">Rekrutmen</a>
				<ul>
					<li><a off_address="" id="sub" href="<?php echo Yii::app()->createUrl('vacancy/member/vacancylist');?>" title="Kelola Lowongan" >Kelola Lowongan</a></li>
					<li><a off_address="" href="<?php echo Yii::app()->createUrl('test/member/locationtest');?>" title="Lokasi Test">Lokasi Test</a></li>
				</ul>
			</li>
			
            <li><a off_address="" href="<?php echo Yii::app()->createUrl('test/member/schedule');?>" title="Jadwal Tes" class="link-ajax <?php if($current == 'member/schedule' || $current == 'member/testrecap' || $current == 'member/preadd') {?> active<?php }?>">Jadwal Tes</a></li>
            <li><a off_address="" href="<?php echo Yii::app()->createUrl('finance/member/publicationpackage');?>" title="Paket Publikasi" name="Paket Publikasi" class="link-ajax <?php if($current == 'member/publicationpackage') {?> active<?php }?>">Paket Publikasi</a></li>
            <li><a off_address="" id="emp-news" href="<?php echo Yii::app()->createUrl('employer/news');?>" title="Berita Employer" class="link-ajax <?php if($module == 'employer' && $controller == 'news') {?> active<?php }?>">Berita Employer</a></li>
             <li>
				<a off_address="" href="javascript:void(0);" title="Registrasi" class="<?php if($module == 'event' && $controller == 'member') {?> active<?php }?>">Registrasi</a>
				<ul>
					<li><a off_address="" href="<?php echo Yii::app()->createUrl('event/member/empfridayindepth');?>" title="Event">Event Friday Indepth</a></li>
				</ul>
			</li>
        </ul>
    </div>
</div>
<?php // End Jobseeker Menu ?>
<?php // Jobseeker Content Menu ?>
<div class="jobseeker-content-menu">
    <div id="mycv" name="jobseekermenu">
        <div class="container clearfix">
            <ul>
                <li><a href="<?php echo Yii::app()->createUrl('jobseeker/biodata/view');?>" title="Pratayang My CV">Pratayang My CV</a></li>
                <li><a href="<?php echo Yii::app()->createUrl('jobseeker/biodata/edit');?>" title="Edit My CV">Edit My CV</a></li>
            </ul>
        </div>
    </div>
    <div id="mycareer" name="jobseekermenu">
        <div class="container clearfix">
            <ul>
                <li><a href="<?php echo Yii::app()->createUrl('test/member/index');?>" title="Panggilan Test">Panggilan Test</a></li>
                <li><a href="<?php echo Yii::app()->createUrl('vacancy/member/resume');?>" title="Resume Lamaran">REsume Lamaran</a></li>
            </ul>
        </div>
    </div>
    <div id="development" name="jobseekermenu">
        <div class="container clearfix">
            <ul>
                <li><a href="<?php echo Yii::app()->createUrl('jobseeker/personaldevelopment/englishassessment');?>" title="English Assessment">English Assessment</a></li>
                <li><a href="<?php echo Yii::app()->createUrl('careerconsultation/member/consultation');?>" title="Career Consultation">Career Consultation</a></li>
                <li><a href="<?php echo Yii::app()->createUrl('jobseeker/personaldevelopment/selfdiagnostic');?>" title="Self Diagnostic">Self Diagnostic</a></li>
            </ul>
        </div>
    </div>
    <div id="registration" name="jobseekermenu">
        <div class="container clearfix">
            <ul>
                <li><a href="<?php echo Yii::app()->createUrl('event/member/index');?>" title="Event">Event</a></li>
                <li><a href="<?php echo Yii::app()->createUrl('personaldevelopment/training');?>" title="Career Consultation">Training</a></li>
            </ul>
        </div>
    </div>
</div>