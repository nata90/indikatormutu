<?php 
	$cs = Yii::app()->getClientScript();
	$url = Yii::app()->createUrl('site/filterSearch');
	$type = $_GET['type'];
	$search = $_GET['search'];
$js = <<<EOP
	var type = '$type';
	var search = '$search';
	$('.search-filter').live('click',function(){
		if ($(this).is(':checked')){
			var value = $(this).val();
			$.ajax({
				type: 'get',
				url: '$url',
				data: {'value':value,'type':type, 'search':search},
				success: function(v) {
					$('.result-view ul').html(v);
				}
			});
		}
	});
EOP;
$ukey = md5(uniqid(mt_rand(), true));
$cs->registerScript($ukey, $js);	
?>
<div class="filter-menu">
	<input class="search-filter" type="radio" name="filter_search" value="1-day"/>&nbsp;24 Jam
	<?php /* <ul id="filter-select">
		<span class="option-mark"></span>
		<li><a class="option selected" href="">Tahun</a></li>
		<li><a class="option" href="">2007</a></li>
		<li><a class="option" href="">2008</a></li>
		<li><a class="option" href="">2009</a></li>
	</ul> */ ?>
</div>
<div class="filter-menu">
	<input class="search-filter" type="radio" name="filter_search" value="1-week"/>&nbsp;1 Minggu
	<?php /* <ul id="filter-select">
		<span class="option-mark"></span>
		<li><a class="option selected" href="">Bulan</a></li>
		<li><a class="option" href="">Jan</a></li>
		<li><a class="option" href="">Feb</a></li>
		<li><a class="option" href="">Mar</a></li>
	</ul> */ ?>
</div>
<div class="filter-menu">
	<input class="search-filter" type="radio" name="filter_search" value="1-month"/>&nbsp;1 Bulan
	<?php /* <ul id="filter-select">
		<span class="option-mark"></span>
		<li><a class="option selected" href="">Tanggal</a></li>
		<li><a class="option" href="">1</a></li>
		<li><a class="option" href="">2</a></li>
		<li><a class="option" href="">3</a></li>
	</ul> */ ?>
</div>
<div class="filter-menu">
	<input class="search-filter" type="radio" name="filter_search" value="1-year"/>&nbsp;1 Tahun
	<?php /* <ul id="filter-select">
		<span class="option-mark"></span>
		<li><a class="option selected" href="">Tanggal</a></li>
		<li><a class="option" href="">1</a></li>
		<li><a class="option" href="">2</a></li>
		<li><a class="option" href="">3</a></li>
	</ul> */ ?>
</div>
<div class="filter-menu">
	<input class="search-filter" type="radio" name="filter_search" value="all"/>&nbsp;Semua
	<?php /* <ul id="filter-select">
		<span class="option-mark"></span>
		<li><a class="option selected" href="">Tanggal</a></li>
		<li><a class="option" href="">1</a></li>
		<li><a class="option" href="">2</a></li>
		<li><a class="option" href="">3</a></li>
	</ul> */ ?>
</div>