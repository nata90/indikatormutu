<div class="navbar navbar-inverse navbar-fixed-top">
	<div class="navbar-inner">
    <div class="container">
        <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </a>
     
          <!-- Be sure to leave the brand out there if you want it shown -->
          <a class="brand" href="#"><b>APLIKASI INDIKATOR MUTU - RSST</b></small></a>
          
          <div class="nav-collapse">
			<?php $this->widget('zii.widgets.CMenu',array(
                    'htmlOptions'=>array('class'=>'pull-right nav'),
                    'submenuHtmlOptions'=>array('class'=>'dropdown-menu'),
					'itemCssClass'=>'item-test',
                    'encodeLabel'=>false,
                    'items'=>array(
                        array('label'=>'Beranda', 'url'=>array('/site/index')),
                        //array('label'=>'Graphs & Charts', 'url'=>array('/site/page', 'view'=>'graphs')),
                        //array('label'=>'Forms', 'url'=>array('/site/page', 'view'=>'forms')),
                        //array('label'=>'Tables', 'url'=>array('/site/page', 'view'=>'tables')),
						//array('label'=>'Interface', 'url'=>array('/site/page', 'view'=>'interface')),
                        //array('label'=>'Typography', 'url'=>array('/site/page', 'view'=>'typography')),
                        /*array('label'=>'Gii generated', 'url'=>array('customer/index')),*/
                        array('label'=>'Master Data <span class="caret"></span>', 'url'=>'#','itemOptions'=>array('class'=>'dropdown','tabindex'=>"-1"),'linkOptions'=>array('class'=>'dropdown-toggle','data-toggle'=>"dropdown"), 
                        'items'=>array(
                            //array('label'=>'Data Harian <span class="badge badge-warning pull-right">26</span>', 'url'=>array('/rekapvariabelharian/create')),
							//array('label'=>'Data Bulanan <span class="badge badge-important pull-right">112</span>', 'url'=>array('/rekapvariabelbulanan/create')),
							//array('label'=>'My Invoices <span class="badge badge-info pull-right">12</span>', 'url'=>'#'),
							array('label'=>'Indikator', 'url'=>array('/indikator/admin')),
							array('label'=>'variabel', 'url'=>array('/variabel/admin')),
							array('label'=>'Satuan Kerja', 'url'=>array('/satker/admin')),
							array('label'=>'Unit', 'url'=>array('/unit/admin')),
							array('label'=>'Kelompok Area', 'url'=>array('/klparea/admin')),
							array('label'=>'Variabel Satuan Kerja', 'url'=>array('/variabelsatker/admin')),
							array('label'=>'Indikator Satuan Kerja', 'url'=>array('/indsatker/admin')),
							array('label'=>'Pengguna', 'url'=>array('/user/admin')),
                        ), 'visible'=>Yii::app()->user->getLevel()==1),
						array('label'=>'Entri Data <span class="caret"></span>', 'url'=>'#','itemOptions'=>array('class'=>'dropdown','tabindex'=>"-1"),'linkOptions'=>array('class'=>'dropdown-toggle','data-toggle'=>"dropdown"), 
                        'items'=>array(
                            //array('label'=>'Data Harian <span class="badge badge-warning pull-right">26</span>', 'url'=>array('/rekapvariabelharian/create')),
							//array('label'=>'Data Bulanan <span class="badge badge-important pull-right">112</span>', 'url'=>array('/rekapvariabelbulanan/create')),
							//array('label'=>'My Invoices <span class="badge badge-info pull-right">12</span>', 'url'=>'#'),
							array('label'=>'Data Harian', 'url'=>array('/rekapvariabelharian/create')),
							array('label'=>'Data Bulanan', 'url'=>array('/rekapvariabelbulanan/create')),
                        ), 'visible'=>!Yii::app()->user->isGuest),
						array('label'=>'Laporan <span class="caret"></span>', 'url'=>'#','itemOptions'=>array('class'=>'dropdown','tabindex'=>"-1"),'linkOptions'=>array('class'=>'dropdown-toggle','data-toggle'=>"dropdown"), 
                        'items'=>array(
                            //array('label'=>'Data Harian <span class="badge badge-warning pull-right">26</span>', 'url'=>array('/rekapvariabelharian/create')),
							//array('label'=>'Data Bulanan <span class="badge badge-important pull-right">112</span>', 'url'=>array('/rekapvariabelbulanan/create')),
							//array('label'=>'My Invoices <span class="badge badge-info pull-right">12</span>', 'url'=>'#'),
							array('label'=>'Hasil Entri Data Harian', 'url'=>array('/rekapvariabelharian/admin')),
							array('label'=>'Hasil Entri Data Bulanan', 'url'=>array('/rekapvariabelbulanan/admin')),
							array('label'=>'Rekap Entri Harian', 'url'=>array('/rekapvariabelharian/laporanharian')),
							array('label'=>'Rekap Entri Bulanan', 'url'=>array('/rekapvariabelbulanan/laporanbulanan')),
							array('label'=>'Laporan Indikator Harian', 'url'=>array('/rekapvariabelharian/laporanindikatorharian')),
							array('label'=>'Laporan Indikator Bulanan', 'url'=>array('/rekapvariabelbulanan/laporanindikatorbulanan')),
                        ), 'visible'=>!Yii::app()->user->isGuest),
                        array('label'=>'Login', 'url'=>array('/site/login'), 'visible'=>Yii::app()->user->isGuest),
                        array('label'=>'Logout ('.Yii::app()->user->name.')', 'url'=>array('/site/logout'), 'visible'=>!Yii::app()->user->isGuest),
                    ),
                )); ?>
    	</div>
    </div>
	</div>
</div>

<div class="subnav navbar navbar-fixed-top">
    <div class="navbar-inner">
    	<div class="container">
        
        	<div class="style-switcher pull-left">
                <a href="javascript:chooseStyle('none', 60)" checked="checked"><span class="style" style="background-color:#0088CC;"></span></a>
                <a href="javascript:chooseStyle('style2', 60)"><span class="style" style="background-color:#7c5706;"></span></a>
                <a href="javascript:chooseStyle('style3', 60)"><span class="style" style="background-color:#468847;"></span></a>
                <a href="javascript:chooseStyle('style4', 60)"><span class="style" style="background-color:#4e4e4e;"></span></a>
                <a href="javascript:chooseStyle('style5', 60)"><span class="style" style="background-color:#d85515;"></span></a>
                <a href="javascript:chooseStyle('style6', 60)"><span class="style" style="background-color:#a00a69;"></span></a>
                <a href="javascript:chooseStyle('style7', 60)"><span class="style" style="background-color:#a30c22;"></span></a>
          	</div>
           <form class="navbar-search pull-right" action="">
           	 
           <input type="text" class="search-query span2" placeholder="Search">
           
           </form>
    	</div><!-- container -->
    </div><!-- navbar-inner -->
</div><!-- subnav -->