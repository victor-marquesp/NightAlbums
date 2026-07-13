<?php

namespace App\Presentation\Views;

use App\Presentation\CLI\Output;

final class MenuView {

    private function __construct() {}

    static public function show() : void {
        Output::clear();
        Output::title("NIGHTALBUMS");
        echo " (1) - Listar Álbuns\n";
        echo " (2) - Listar Experiências\n";
        echo " (0) - Sair\n";
        echo "-------------------------------------------------------\n";
        echo "Digite sua opção -> ";
    }

}