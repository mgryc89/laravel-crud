<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
// use Illuminate\Routing\UrlGenerator;
use App\Name;

class MojController extends Controller
{
    public function index()
    {
    	// var_dump( Name::get() );
    	echo "string";
    }
}
