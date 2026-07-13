<?php

namespace App\Presentation\CLI;

use InvalidArgumentException;

final class Input {

    private function __construct() {}

    static public function number(string $display = '') : int {
        return (int) readline($display);
    }
    
    static public function decimal(string $display = '') : float {
        return (float) readline($display);
    }

    static public function word(string $display = '') : string {
        $input = (string) readline($display);

        if(mb_strlen($input) > 120) {
            throw new InvalidArgumentException('Esse Input excede o máximo de caracteres - 120');
        }

        return $input;
    }

    static public function text(string $display = '') : string {
        return (string) readline($display);
    }

}
