<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use Request;
class IndexController extends Controller
{
	public function index()
	{
		 return view('Home/index');
	}
}