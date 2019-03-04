<?php Yii::import('application.modules.jobseeker.models.*');?>
<div class="container clearfix">
	<div class="box">
	<?php if(Yii::app()->user->id == 3) { ?>
		<div class="name">
			<span>Halo,</span><a href="<?php echo Yii::app()->createUrl('employer/biodata/edit');?>" title="<?php echo $model->emp_data->contact_person;?>"><?php echo $model->emp_data->contact_person;?></a>
			<div class="clear"></div>
		</div>
		<ul>
			<li><a href="<?php echo Yii::app()->createUrl('employer/member/editdata');?>" title="Account Setting">Edit Data</a></li>
			<li><a href="<?php echo Yii::app()->createUrl('employer/member/setting',array('type'=>'password'));?>" title="Privasi Setting">Change Password</a></li>
			<li><a href="<?php echo Yii::app()->createUrl('employer/member/notifier');?>" title="Email Notifikasi">Email Notifikasi</a></li>
			<li><a off_address="" href="<?php echo Yii::app()->createUrl('testimonial/member/index');?>" title="Testimonial">Testimonial</a></li>
			<li><a href="<?php echo Yii::app()->createUrl('faq/site/index');?>" title="Help">Help</a></li>
		</ul>
		
	<?php } else {?>
		<div class="name">
			<span>Halo,</span><a href="<?php echo Yii::app()->createUrl('jobseeker/biodata/edit');?>" title="<?php echo $model->jobseeker_bios->complete_name;?>"><?php echo $model->jobseeker_bios->complete_name;?></a>
			<div class="clear"></div>
		</div>
		<ul>
			<?php if(Yii::app()->user->id != 11) { //not member tracer study ?>
                            <li><a href="<?php echo Yii::app()->createUrl('jobseeker/member/setting',array('type'=>'password'));?>" title="Account Setting">Account Setting</a></li>
                        <?php } ?>
                        <?php /*<li><a href="" title="Privasi Setting">Privasi Setting</a></li>*/?>
                        <?php if(!in_array(Yii::app()->user->id, array(11))){ //member tracer ?>
                                <li><a href="<?php echo Yii::app()->createUrl('jobseeker/member/notifier');?>" title="Email Notifikasi">Email Notifikasi</a></li>
                                <li><a off_address="" href="<?php echo Yii::app()->createUrl('testimonial/member/index');?>" title="Testimonial">Testimonial</a></li>
			<?php } ?>
                        <?php if(in_array(Yii::app()->user->id, array(6,7,8,10))){ //non member lifetime ?>
                        <?php 
                            $linkUpgrade = count($upgrade) == 0 ? Yii::app()->createUrl('jobseeker/upgrade/index') : Yii::app()->createUrl('jobseeker/upgrade/payment');
                         ?>
				<li><a href="<?php echo $linkUpgrade; ?>" title="Upgrade Membership">Upgrade Membership</a></li>
				
			<?php } ?>
                        <?php if(Yii::app()->user->id != 11) { //not member tracer study ?>
                            <li><a href="<?php echo Yii::app()->createUrl('faq/site/index');?>" title="Help">Help</a></li>
                        <?php } ?>
		</ul>
	<?php } ?>
		<span>
			<a off_address="" href="<?php echo Yii::app()->createUrl('site/logout') ?>" title="Logout">Logout</a>
		</span>
	</div>
</div>