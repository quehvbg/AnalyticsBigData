<?php

namespace Framework\Core\Services;

use Framework\Core\Repositories\MenuRepositoryContract;

class MenuService implements MenuServiceContract
{
    protected $repository;

    public function __construct(MenuRepositoryContract $repository)
    {
        return $this->repository = $repository;
    }

    public function addMenu($menu){
        $this->repository->addMenu($menu);
    }

    public function addSubMenu($submenu){
        $this->repository->addSubMenu($submenu);
    }

    public function addMenuItem($item){
        $this->repository->addMenuItem($item);
    }

    public function getListMenu()
    {
        return $this->repository->getListMenu();
    }
}