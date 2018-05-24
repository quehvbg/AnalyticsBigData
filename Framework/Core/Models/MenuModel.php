<?php
namespace Framework\Core\Models;

use Framework\Core\Entities\Menu;

class MenuModel {
    public $arrMenu;
    
    public function __construct()
    {
        $this->arrMenu = array();
    }

    public function addMenu($menu){
        $this->arr_Menu.add($menu);
    }

    public function getListMenu(){
        return $this->arrMenu;
    }
}