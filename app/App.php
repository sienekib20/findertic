<?php

namespace App;

class App
{
    //
    private $root;

    //
    public function __construct()
    {
    }

    
    public function abs_path()
    {
        return $this->root;
    }

    public function run(string $dir)
    {
        $this->root = $dir;
    }
}
