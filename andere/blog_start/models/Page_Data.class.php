<?php

class Page_Data {
	public $title = '';
	public $content = '';
	public $css = '';
	public $embeddedStyle = '';
    public $scriptElements = '';

	/**
	 * @param $href
	 * map en naam van het stijlblad
     */
	public function addCSS($href){
		$this->css .= "<link href='$href' rel='stylesheet' >";
	}

	public function addScript($src){
        $this->scriptElements .= "<script src='$src'></script>";
    }
}
