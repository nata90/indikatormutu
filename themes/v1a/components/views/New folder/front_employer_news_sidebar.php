<?php //begin.Employer News INfo ?>
<?php foreach ($model as $key => $val) { ?>
<div class="news-info">
	<span>-</span>
	<span class="desc"><?php echo $val->content->title; ?></span>
	<a href="<?php echo Yii::app()->createUrl('employer/news/view', array('id'=>$val->content_id)); ?>">selengkapnya</a>
</div>
<?php } ?>
<?php //end.Employer News Info ?>