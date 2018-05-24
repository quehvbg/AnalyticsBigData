<?php
namespace Framework\Core\Entities;

class MenuItem {
    public $link;
    public $text;
    public $title;
    public $class;
    public $icon;
    public $target;

    public function __construct($url, $ptext){
        $this->link = $url;
        $this->text = $ptext;
    }    
}