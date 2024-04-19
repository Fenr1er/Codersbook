<?php

namespace App\Controller;

use App\Core\Controller;

class DashboardController extends Controller{

    public function index()
    {
       view('dashboard');
    }

}