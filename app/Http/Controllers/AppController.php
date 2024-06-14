<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller as AbstracController;

class AppController extends AbstracController
{
	public function index($helpers)
	{
		$name = 'siene';
		return $helpers->view('site.welcome');
	}
}