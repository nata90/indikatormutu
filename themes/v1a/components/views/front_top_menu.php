<ul id="nav" class="dropdown dropdown-horizontal tes">
	<li>
		<a class="dir" href="<?php echo Yii::app()->createUrl('site/logout');?>">Logout</a>
	</li>
	 


	<?php 
	if($topMenu != null){
		foreach($topMenu as $val){ ?>
			<li>
				<a class="dir" href="<?php echo Yii::app()->createUrl($val->url);?>"><?php echo $val->title;?></a>
			</li>
	<?php }
	}
	?>
			<?php /* <li>
				<marquee width="90%" scrolldelay="150" > 
					<a   href=" "><font size="1"> *ssdf ase fasef asef ase ase fase fasedf asedf sda sdf asdf asd asdf as </font>                     </a>
					<a   href=" "><font size="1.5px"> *dddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddd dddddddddddddddddddddddddd</font>                        </a>
				</marquee>
			</li> */ ?>
	<?php /* <li><a class="dir" href="#">MASTER</a>
		<ul>
			<li><a href="index.php?link=add_user">ADD USER</a></li>
			<li><a href="index.php?link=private">LIST USER</a></li>
			<li><a href="?link=191">EDIT ICD</a></li>
			<li><a href="?link=19">LIST ICD</a></li>
			<li><a href="index.php?link=jdoc2">ADD JADWAL</a></li>
			<li><a href="index.php?link=jdoc3">LIST JADWAL</a></li>
		</ul>
	</li>
	
	<li>
		<a class="dir" href="">menu</a>	
	</li>
	<li>
		<a class="dir" href="">menu</a>	
	</li>
	<li>
		<a class="dir" href="">menu</a>	
	</li>
	<li>
		<a class="dir" href="">menu</a>	
	</li>
	<li>
		<a class="dir" href="">menu</a>	
	</li>
	<li>
		<a class="dir" href="">menu</a>	
	</li>
	<li>
		<a class="dir" href="">menu</a>	
	</li>
	<li>
		<a class="dir" href="">menu</a>	
	</li>
	<li>
		<a class="dir" href="">menu</a>	
	</li> */ ?>
	
	
</ul>