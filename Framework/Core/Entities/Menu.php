<?php

namespace Framework\Core\Entities;

class Menu extends MenuItem
{
    public $arrSubmenu;

    public function __construct($plink, $ptext, $picon)
    {
        $this->arrSubmenu = array();
        $this->link = $plink;
        $this->text = $ptext;
        $this->icon = $picon;
    }

    public function addSubmenu($submenu){        
        $this->arrSubmenu = $submenu;
    }

    public function getListSubmenu(){
        return $this->arrSubmenu;
    }
}