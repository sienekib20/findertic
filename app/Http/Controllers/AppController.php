<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller as AbstracController;

class AppController extends AbstracController
{
	public function index($helpers)
	{
		$helpers->view('site.welcome');
	}
}
