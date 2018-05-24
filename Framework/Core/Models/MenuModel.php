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
        array_push($this->arrMenu, $menu);
    }

    public function getListMenu(){
        return $this->arrMenu;
    }
}