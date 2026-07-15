<?php

namespace App\Presentation\Views\Experience;

use App\Presentation\CLI\Output;
use App\Presentation\CLI\Render;
use App\Presentation\CLI\Input;

use App\Domain\Models\Experience;

final class ExperienceListView {

    private function __construct() {}

    static public function read(array $experiences) : int {

        Output::clear();
        Output::header('Experiências Cadastradas');

        Render::list(
            $experiences,
            fn (Experience $e) =>
                $e->getAlbum()->getName()
                . ' | '
                . substr($e->getDesc() ?? '', 0, 20)
                . ' | '
                . $e->getMood()
        );
        Output::separator();
        
        Render::menu([
            1 => 'Visualizar Experiência',
            2 => 'Cadastrar Nova Experiência',
            0 => 'Voltar'
        ]);
        Output::separator();

        return Input::number('Digite sua opção -> ');
    }

}
