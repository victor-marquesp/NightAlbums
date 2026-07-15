<?php

namespace App\Presentation\Views;

use App\Presentation\CLI\Output;
use App\Presentation\CLI\Input;
use App\Presentation\CLI\Render;

final class MainMenuView {

    private function __construct() {}

    static public function read() : int {
        Output::clear();
        Render::menu([
            1 => 'Álbuns',
            2 => 'Minhas Experiências',
            0 => 'Sair'
        ]);
        return Input::number('Digite sua opção -> ');
    }

}
