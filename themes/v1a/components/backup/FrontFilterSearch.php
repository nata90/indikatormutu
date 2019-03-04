<?php

class FrontFilterSearch extends CWidget
{

	public function run() {
		$actual_link = 'http://'.$_SERVER['HTTP_HOST'].$_SERVER['PHP_SELF'];
		$this->render('front_filter_search', array(
			'actual_link'=>$actual_link,
		));	
	}
}
?>