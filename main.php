<?php


require 'vendor/autoload.php';
// require 'Tests/GeneralTest.php';

use App\Bootstrap\Application;
// use Tests\GeneralTest;

// GeneralTest::test();

$app = new Application();

$app->run();