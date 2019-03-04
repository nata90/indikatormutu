<?php  
$this->beginWidget('zii.widgets.jui.CJuiDialog',array(
	'id'=>'mydialog',
	// additional javascript options for the dialog plugin
	'options'=>array(
		'title'=>'PERINGATAN!',
		'autoOpen'=>false,
		'modal'=>true,
		/*'buttons'=>array(
			'Proses'=>'js:function(){}',
			'Tidak'=>'js:function(){$(this).dialog("close")}'
		),*/
            
	),
)); 
$this->endWidget('zii.widgets.jui.CJuiDialog');
		
?>