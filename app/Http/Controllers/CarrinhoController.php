<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

class CarrinhoController extends Controller
{
	public function index($helpers)
	{
		$helpers->view('site.carrinho');
	}
}
