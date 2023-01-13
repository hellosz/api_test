<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class IndexController extends Controller
{
	/**
	* undocumented function
	*
	* @return void
	*/
	public function index(Request $request)
	{
		return 'hello laravel!';
	}
}
