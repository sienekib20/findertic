<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

class ProdutosController extends Controller
{
	public function index($helpers)
	{
		$helpers->view('site.produtos');
	}
}
