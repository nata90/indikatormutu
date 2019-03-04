<?php

class FrontFooterContact extends CWidget
{

	public function init() {
	}

	public function run() {
		$this->renderContent();
	}

	protected function renderContent() {
		$this->render('front_footer_contact');

	}
}
