<?php

class Page_Data {
    public $title="";
    public $content="";
    public $css = "";
    public $embeddedStyle = "";
    public $scriptElements = "";

    // nieuwe methode om stijlbladen toe te voegen, DRY)
    public function addCSS($href){ // de verwijzing naar het stijlblad komt in een variabele $href (dat is dus de waarde in deze vorm: css/layout.css
        $this->css .= "<link href='$href' rel='stylesheet' />"; // dit is mijn variabele in de klasse Page_Data (verwijst naar $css hierobven, daarom .= er wordt inhoud aan de bestaande (lege) variabele $css toegevoegd)
    }

    public function addScript($src) { //function voor JS
        $this->scriptElements .= "<script src='$src'></script>";
    }
}