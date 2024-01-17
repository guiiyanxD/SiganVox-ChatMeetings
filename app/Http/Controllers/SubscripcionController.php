<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SubscripcionController extends Controller
{
    public function index(){
        return view('Subscripcion.index');
    }
}
