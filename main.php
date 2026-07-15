<?php


require 'vendor/autoload.php';
// require 'Tests/GeneralTest.php';

use App\Bootstrap\Application;
// use Tests\GeneralTest;

// GeneralTest::test();

try {

    $app = new Application();
    $app->run();

} catch(Exception $e) {
    print_r($e);
    exit(1);
}
