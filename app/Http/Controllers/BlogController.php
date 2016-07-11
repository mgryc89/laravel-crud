<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Name;
use App\Tag;

class BlogController extends Controller
{
	public function index()
	{
		$dane = Name::paginate(3);
		return view('blog.index')->withDane($dane);
	}

    public function single($slug)
    {
    	$dane = Name::where('slug','=',$slug)->first();

    	return view('blog.single')->with('dane', $dane);
    }
}
