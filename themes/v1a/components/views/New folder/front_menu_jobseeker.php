<?php
$module = strtolower(Yii::app()->controller->module->id);
$current = strtolower(Yii::app()->controller->id.'/'.Yii::app()->controller->action->id);
$controller = strtolower(Yii::app()->controller->id);
$action = strtolower(Yii::app()->controller->action->id);
?>
<?php if($action != 'wizard' && $action != 'wizardfinish' && $action != 'test' && $controller != 'englishassesment' && $controller != 'selfdiagnostic' && $module != 'tracerstudy') { ?>
<div class="jobseeker-menu">	
	<ul class="clearfix">
		<?/* <li id="notif"><a off_address="" href="javascript:void(0);" id="notification" title="Notifikasi" class="<?php if($module == 'jobseeker' && $current == 'site/notification') {?> active<?php }?>"><?php echo $total!=0?"<span>$total</span>":"";?></a>
			<ul class="notification">
				<li>
					<span>Semua Notifikasi</span>
					<?php echo $total; ?>
				</li>
				<?php if ($countTestCall != 0) { ?>
				<li>
					<a off_address="" href="<?php echo Yii::app()->createUrl('jobseeker/site/notification/type/test-call');?>">
						<span>Panggilan Tes</span>
						<?php echo $countTestCall; ?>
					</a>
				</li>
				<?php
				}
				if ($countSubscription != 0) {
				?>
				<li>
					<a off_address="" href="<?php echo Yii::app()->createUrl('jobseeker/site/notification/type/subscription');?>">
						<span>Subscribe Lowongan</span>
						<?php echo $countSubscription; ?>
					</a>
				</li>
				<?php
				}
				if ($countMemberNews != 0) {
				?>
				<li>
					<a off_address="" href="<?php echo Yii::app()->createUrl('jobseeker/site/notification/type/member-news');?>">
						<span>Berita Member</span>
						<?php echo $countMemberNews; ?>
					</a>
				</li>
				<?php
				}
				if ($countFridayIndepth != 0) {
				?>
				<li>
					<a off_address="" href="<?php echo Yii::app()->createUrl('jobseeker/site/notification/type/friday-indepth');?>">
						<span>Friday Indepth</span>
						<?php echo $countFridayIndepth; ?>
					</a>
				</li>
				<?php
				}
				if ($countSpecialEvent != 0) {
				?>
				<li>
					<a off_address="" href="<?php echo Yii::app()->createUrl('jobseeker/site/notification/type/special-event');?>">
						<span>Special Event</span>
						<?php echo $countSpecialEvent; ?>
					</a>
				</li>
				<?php } ?>
				<li>
					<?php if ($total != 0) { ?>
					<a off_address="" href="<?php echo Yii::app()->createUrl('jobseeker/site/clearnotification');?>">Clear Notifikasi</a>
					<a off_address="" href="<?php echo Yii::app()->createUrl('jobseeker/site/notification');?>">Lihat Semua</a>
					<?php } ?>
				</li>
			</ul>
		</li> */?>
		<li><a off_address="" href="<?php echo Yii::app()->createUrl('jobseeker/site/index');?>" title="Headquarter" class="link-ajax <?php if($module == 'jobseeker' && $current == 'site/index') {?> active<?php }?>">Headquarter</a></li>
		<li>
			<a off_address="" href="javascript:void(0);" title="My CV" class="<?php if($module == 'jobseeker' && in_array($controller, array ('biodata','education','experience','language','toefl','organization','course','recommendation','achievement','expertise','excess'))) {?> active<?php }?>">My CV</a>
			<ul>
				<li><a off_address="" href="<?php echo Yii::app()->createUrl('jobseeker/biodata/view');?>" title="Pratayang My CV" >Pratayang My CV</a></li>
				<li><a off_address="" href="<?php echo Yii::app()->createUrl('jobseeker/biodata/edit');?>" title="Edit My CV" >Edit My CV</a></li>
				<?/* <li><a off_address="" href="<?php echo Yii::app()->createUrl('jobseeker/member/setpubliccv');?>" title="Edit My CV" >Set Public CV</a></li> */?>
			</ul>
		</li>
		<li>
			<a off_address="" href="javascript:void(0);" title="My Career" class="<?php if($module == 'test' && $controller == 'member' || $module == 'vacancy' && $controller == 'member') {?> active<?php }?>">My Career</a>
			<ul>
				<li><a off_address="" href="<?php echo Yii::app()->createUrl('test/member/index');?>" title="Panggilan Test" >Panggilan Test</a></li>
				<li><a off_address="" href="<?php echo Yii::app()->createUrl('vacancy/member/resume');?>" title="Resume Lamaran" >Resume Lamaran</a></li>
				<li><a off_address="" href="<?php echo Yii::app()->createUrl('bookmark/member/index');?>" title="Resume Lamaran" >Bookmark Lowongan</a></li>
			</ul>
		</li>
		<li>
			<a off_address="" href="javascript:void(0);" title="Personal Development" class="<?php if($module == 'jobseeker' && $controller == 'personaldevelopment' || $module == 'careerconsultation') {?> active<?php }?>">Personal Development</a>
			<ul>
				<li><a off_address="" href="<?php echo Yii::app()->createUrl('personaldevelopment/personalassesment');?>" title="Self Diagnostic">Personal Assessment</a></li>
				<li><a off_address="" href="<?php echo Yii::app()->createUrl('personaldevelopment/skillassesment');?>" title="English Assessment">Skill Assessment</a></li>
				<li><a off_address="" href="<?php echo Yii::app()->createUrl('personaldevelopment/counseling');?>" title="Career Consultation">Career Counseling</a></li>
			</ul>
		</li>
		<li><a off_address="" href="<?php echo Yii::app()->createUrl('jobseeker/news');?>" title="Berita Member" class="<?php //link-ajax ?> <?php if($module == 'jobseeker' && $controller == 'news') {?> active<?php }?>">Berita Member</a></li>
		<li>
			<a off_address="" href="javascript:void(0);" title="Registrasi" class="<?php if($module == 'event' && $controller == 'member') {?> active<?php }?>">Registrasi</a>
			<ul>
				<?php $url = Utility::getComingSoonEvent(); ?>
				<?php /*<li><a off_address="" href="<?php echo Yii::app()->createUrl('event/member/index');?>" title="Event">Event</a></li>*/ ?>
				<li><a off_address="" href="<?php echo Yii::app()->createUrl('event/member/index');?>" title="Event">Event</a></li>
				<li><a off_address="" href="<?php echo $url;?>" title="Career Consultation">Training</a></li>
				<li><a off_address="" href="<?php echo Yii::app()->createUrl('finance/site/confirm');?>" title="Konfirmasi Pembayaran">Konfirmasi Pembayaran</a></li>
			</ul>
		</li>
	</ul>
</div>
<?php } ?>