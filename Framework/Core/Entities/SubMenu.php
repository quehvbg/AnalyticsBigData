<?php

namespace Framework\Core\Entities;

class SubMenu extends MenuItem
{
    public $arrItem;

    public function __construct()
    {
        $this->arrItem = array();
    }

    public function addItem($item){
        $this->arrItem[] = $item;
    }

    public function getListItem(){
        return $this->arrItem;
    }
}