<?php

namespace Framework\Core\Entities;

class SubMenu extends MenuItem
{
    public $arrItem;

    public function __construct($plink, $ptext, $parrItem)
    {
        $this->arrItem = $parrItem;
        $this->link = $plink;
        $this->text = $ptext;        
    }

    public function addItem($item){
        $this->arrItem[] = $item;
    }

    public function getListItem(){
        return $this->arrItem;
    }
}