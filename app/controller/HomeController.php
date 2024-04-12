<?php

namespace App\Controller;

use App\Core\Controller;

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


}