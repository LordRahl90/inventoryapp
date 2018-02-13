<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{

    public function index()
    {
        return view('sites.index');
    }

    public function about()
    {
        return view('sites.about');
    }

    public function contact()
    {
        return view('sites.contact');
    }

    public function login()
    {
        return view('sites.login');
    }

    public function register()
    {
        return view('sites.register');
    }

    public function wishlist()
    {
        return view('sites.wishlist');
    }

    public function shoppingBag()
    {
        return view('sites.shoppingBag');
    }

    public function listings(){
        return view('sites.listings');
    }

    public function detail(){
        return view('sites.detail');
    }
}
