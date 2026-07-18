<?php

namespace App\Presentation\Views\Experience;

use App\Presentation\CLI\Output;
use App\Presentation\CLI\Render;
use App\Presentation\CLI\Input;

use App\Domain\Models\Experience;

final class ExperienceView {

    private function __construct() {}

    static public function read(Experience $experience) : int {

        Output::title();
        Output::header('Experiência');

        Render::entity([
            'ID          ' => $experience->getId(),
            'Álbum       ' => $experience->getAlbum()->getName(),
            'Mood        ' => $experience->getMood(),
            'Estrelas    ' => $experience->getStars(),
            'Descrição   ' => $experience->getDesc(),
        ]);
        Output::separator();

        Render::menu([
            1 => 'Visualizar Álbum',
            2 => 'Editar',
            3 => 'Deletar',
            0 => 'Voltar'
        ]); 

        return Input::number('> ');
    }
}
