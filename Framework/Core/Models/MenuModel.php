<?php
namespace Framework\Core\Models;

use Framework\Core\Entities\Menu;

class MenuModel {
    public $arrMenu;
    public $index;

    public function __construct()
    {
        $this->arrMenu = array();
        $this->index = 0;
    }

    public function addMenu($menu){
        array_push($this->arrMenu, $menu);
        $this->index = count($this->arrMenu);
    }

    public function addSubMenu($submenu){
        
        if($this->arrMenu[$this->index - 1] instanceof Menu){            
            $this->arrMenu[$this->index - 1]->addSubMenu($submenu);            
        }        
    }

    public function getListMenu(){
        return $this->arrMenu;
    }
}