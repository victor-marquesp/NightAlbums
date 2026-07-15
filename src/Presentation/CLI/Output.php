<?php

namespace App\Presentation\CLI;

final class Output {

    private function __construct() {}

    static public function separator() {
        echo "-------------------------------------------------------\n";
    }

    static public function title(string $title) : void {
        echo "=======================================================\n";
        echo "\t $title\n";
        echo "=======================================================\n";
    }

    static public function header(string $header) : void {
        echo "=======================================================\n";
        echo "\t $header\n";
        echo "=======================================================\n";
    }

    static public function goodbye() : void {
        echo "=======================================================\n";
        echo "    ADEUS, OBRIGADO POR UTILIZAR\n";
        echo "=======================================================\n";
    }

    static public function success(string $message) : void {
        echo "=======================================================\n";
        echo "SUCESSO: $message\n";
        echo "=======================================================\n";
    }

    static public function failure(string $message) : void {
        echo "=======================================================\n";
        echo "ERRO: $message\n";
        echo "=======================================================\n";
    }

    static public function empty($message) : void {
        echo "VAZIO: $message\n";
    }

    static public function pause() : void {
        readline("DIGITE QUALQUER TECLA PARA CONTINUAR... \t\t\t");
    }

    static public function clear() : void {
        echo "\e[H\e[J";
    }

}