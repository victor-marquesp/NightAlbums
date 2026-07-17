<?php

namespace App\Presentation\CLI;

use App\Presentation\CLI\Output;

use InvalidArgumentException;

final class Input {

    private function __construct() {}

    static public function number(string $display = '', ?int $default = null) : int {
        while (true) {
            $input = trim(readline($display));

            if ($input === '') {

                if($default != null) {
                    return $default;
                }

                Output::failure('Digite um valor.');
                continue;
            }

            if (!ctype_digit($input)) {
                Output::failure('Digite um número inteiro.');
                continue;
            }

            return (int) $input;
        }
    }
    
    static public function decimal(string $display = '', ?float $default = null) : float {
        while (true) {
            $input = trim(readline($display));

            if ($input === '') {

                if($default != null) {
                    return $default;
                }
            
                Output::failure('Digite um valor.');
                continue;
            }

            if (!is_numeric($input)) {
                Output::failure('Digite um número.');
                continue;
            }

            return (float) $input;
        }
    }

    static public function word(string $display = '', ?string $default = null) : string {
        while (true) {
            $input = trim(readline($display));

            if ($input === '') {

                if($default != null) {
                    return $default;
                }

                Output::failure('Digite um valor.');
                continue;
            }

            if (mb_strlen($input) > 120) {
                Output::failure('Máximo de 120 caracteres.');
                continue;
            }

            return $input;
        }
    }

    static public function text(string $display = '', ?string $default = null, bool $hasPassed = false) : ?string {
        $input = trim(readline($display));

        if($default != null) {
            return $default;
        }

        return $input === '' ? null : $input;
    }

    static public function confirm(string $display = 'Tem Certeza?') : bool {

        while (true) {
            $input = trim(readline($display .'(s/n) -> '));

            if ($input === 's') {
                return true;
            }  

            if($input === 'n') {
                return false;
            }

            Output::failure('Digite uma opção correta.');
            continue;

        }
    }

}
