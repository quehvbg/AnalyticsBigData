<?php

namespace Framework\Core\Entities;

class Menu extends MenuItem
{
    public $arrSubmenu;

    public function __construct()
    {
        $this->arrSubmenu = array();
    }

    public function addSubmenu($submenu){
        $this->arrSubmenu[] = $submenu;
    }

    public function getListSubmenu(){
        return $this->arrSubmenu;
    }
}