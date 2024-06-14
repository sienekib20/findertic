<?php

namespace Sienekib\Proto;
 
use Sienekib\Proto\Routing\Anotation\Route;
use Sienekib\Proto\Routing\Anotation;
use Sienekib\Proto\Http\Request;
use Sienekib\Proto\Http\Response;

class Proto
{
	protected $router;
	protected static $dir;

	public function __construct(string $root)
	{
		$this->router = new Route(new Request(), new Response());
		static::$dir = $root;
	}

	public static function abs()
	{
		return static::$dir;
	}

	public static function getInstance()
	{
		static $instance = null;
	 	if ($instance === null) {
	       $instance = new self();
	 	}
	 	return $instance;
	}

	public function dispatch()
	{
		$this->router->dispatch();
	}
}