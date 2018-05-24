<?php

namespace Framework\Core\Interfaces;

interface BaseInterfaceMenu
{
    public function addMenu($menu);
    public function addSubMenu($submenu);
    public function addMenuItem($item);    
    public function getListMenu();
}