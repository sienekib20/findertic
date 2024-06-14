<?php

//
require __DIR__ . '/../vendor/autoload.php';

//
//require __DIR__ . '/../core/Helpers.php';

//
require __DIR__ . '/../routes/web.php';

$proto = new Sienekib\Proto\Proto(__DIR__.'/../');
$proto->dispatch();
