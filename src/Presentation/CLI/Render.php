<?php

namespace App\Presentation\CLI;

use App\Presentation\CLI\Output;
use App\Presentation\CLI\Input;

final class Render {

    private function construct() {}

    static public function menu(array $options) {

        Output::separator();
        foreach($options as $number => $text) {
            echo "($number) - { $text } .\n";
        }
        Output::separator();

    }

    static public function list() {
    }

    static public function table() {
        
    }
}