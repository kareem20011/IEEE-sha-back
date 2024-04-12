<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MainErrorsController extends Controller
{
    public function error_403(){
        return view('errors.403');
    }
}
