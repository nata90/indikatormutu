<ul id="nav" class="dropdown dropdown-horizontal tes">

	<li>
		<a class="dir" href="<?php echo Yii::app()->createUrl('site/logout');?>">Logout</a>
	</li>
	<?php /* if($idGroup == 1){ //untuk super admin menu tampil ?>
		<li>
			<a class="dir" href="<?php echo Yii::app()->createUrl('app/appmenu/admin');?>">Kelola Menu</a>
		</li>
	<?php } */?>
	
	<?php 
	foreach($topMenu as $val){ ?>
		<li>
			<?php 
			if($val->url == 'javascript:void(0);'){
				$link = $val->url;
			}else {
				$link = Yii::app()->createUrl($val->url);
			} ?>
			<?php //echo  $val->appMenuForGroups2->order_menu;?> <a class="dir" href="<?php echo $link;?>"><?php echo $val->title;?></a>
			<?php 
			
			
			$cekSub = AppMenuForGroup::model()->findAll(array(
						'with'=>array('idMenu'),
						// 'condition'=>'id_position=2 AND publish=1 AND id_parent=0 ', 
						'condition'=>'idMenu.id_position=1 AND idMenu.publish=1 AND idMenu.id_parent = '. $val->id .' AND id_group ='.$idGroup.' AND tayang = 1', 
						'order'=>'order_menu ASC',
					));
			
			if($cekSub != null){ 
				echo '<ul>';
				foreach($cekSub as $item){ 
					if($item->idMenu->url == 'javascript:void(0);'){
						$link2 = $item->idMenu->url;
					}else {
						$link2 = Yii::app()->createUrl($item->idMenu->url);
					}
				?>
					<li><a href="<?php echo $link2;?>"><?php echo $item->idMenu->title;?></a></li>
				<?php }
				echo '</ul>';
			}
					
					
			/* $cekSub = AppMenu::model()->findAllByAttributes(array('id_parent'=>$val->id,'publish'=>1));
			if($cekSub != null){ 
				echo '<ul>';
				foreach($cekSub as $item){ 
					if($item->url == 'javascript:void(0);'){
						$link2 = $item->url;
					}else {
						$link2 = Yii::app()->createUrl($item->url);
					}
				?>
					<li><a href="<?php echo $link2;?>"><?php echo $item->title;?></a></li>
				<?php }
				echo '</ul>';
			} */
			?>	
		</li>
		
		
	<?php }
	?>
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