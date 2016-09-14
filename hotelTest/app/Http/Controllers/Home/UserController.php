<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use Request;
class UserController extends IndexController
{
	public function Login()
	{
		 return view('Home/login');
	}
}