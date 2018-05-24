<?php
namespace Framework\Core\Repositories;

use Framework\Core\Models\MenuModel;

class MenuRepository implements MenuRepositoryContract
{
    private $model;

    public function __construct()
    {
        $this->model = new MenuModel();
    }

    public function addMenu($menu){
        $this->model.addMenu($menu);
    }
    
    public function addSubMenu($submenu){
        $this->model.addSubMenu($submenu);
    }

    public function addMenuItem($item){
        $this->model.addMenuItem($item);
    }
    
    public function getListMenu()
    {
        return $this->$model->getListMenu();
    }
}