<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Framework\Core\Services\MenuServiceContract;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(MenuServiceContract $service)
    {
        $this->middleware('auth');
        $this->menuService = $service;
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //Laraviet: test menu service only
        dd($this->menuService->getListMenu());
        //return view('home');
        return view('page.index');
    }

    public function sk403(){
        return view('403');
    }

    public function sk404(){
        return view('404');
    }

    public function sk500(){
        return view('500');
    }


    public function sk_login(){
        return view('page.login');
    }

    public function sk_profile(){
        return view('page.profile');
    }

    public function sk_settings(){
        return view('page.profile');
    }
}
