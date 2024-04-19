<?php

namespace App\Controller;

use App\Core\Controller;
use App\Core\Session;
class HomeController extends Controller
{
    public function index()
    {
       view('home');
    }

    function signup()
    {
        view('signup');
    }

    function login()
    {
        view('login');
    }

    public function logout()
    {
        if(Session::destroy()){
            header("Location:/");
            exit();
        }

    }
}