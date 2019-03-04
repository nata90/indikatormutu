<?php if($grup != 3){?>
	<li name="memberlogin">
		<a off_address="" href="javascript:void(0);" title="<?php echo $model->jobseeker_bios->complete_name?>" class="memberlogin">
			<?php if($model->jobseeker_bios->photo == ''){
				if($model->jobseeker_bios->sex == 'Wanita')
					$images = Yii::app()->request->baseUrl.'/public/jobseeker_photo/blank_p.jpg';
				else
					$images = Yii::app()->request->baseUrl.'/public/jobseeker_photo/blank_l.jpg';
			} else {
				$images = Yii::app()->request->baseUrl.'/public/jobseeker_photo/'.$model->jobseeker_bios->photo;
			}?>
			<img src="<?php echo $images;?>" alt="<?php echo $model->jobseeker_bios->complete_name?>" title="<?php echo $model->jobseeker_bios->complete_name?>" />
		</a>
	</li>
<?php }else{ ?>
	<li name="memberlogin">
		<a off_address="" href="javascript:void(0);" title="<?php echo $model->emp_data->name?>" class="memberlogin">
			<?php if($model->emp_data->company_logo == ''){
				$images = Yii::app()->request->baseUrl.'/public/jobseeker_photo/blank_l.jpg';
			} else {
				$images = Yii::app()->request->baseUrl.'/public/employer_logo/'.$model->id.'/small_'.$model->emp_data->company_logo;
			}?>
			<img src="<?php echo $images;?>" alt="<?php echo $model->emp_data->name?>" title="<?php echo $model->emp_data->name?>" />
		</a>
	</li>
<?php } ?>