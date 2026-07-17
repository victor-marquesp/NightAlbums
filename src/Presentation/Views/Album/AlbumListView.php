<?php

namespace App\Presentation\Views\Album;

use App\Presentation\CLI\Output;
use App\Presentation\CLI\Render;
use App\Presentation\CLI\Input;

use App\Domain\Models\Album;

final class AlbumListView {

    private function __construct() {}

    static public function read(array $albums) : int {

        Output::clear();
        Output::header('Álbuns Cadastrados');

        if(empty($albums)) {
            Output::empty('Sem Álbuns Cadastrados');
        }
        else {
           Render::list(
                $albums,
                fn (Album $a) => $a->getName()
            );
        }

        Output::separator();
        
        Render::menu([
            1 => 'Visualizar Álbum',
            0 => 'Voltar'
        ]);
        Output::separator();

        return Input::number('Digite sua opção -> ');
    }

    static public function collectId() : int {
        return Input::number('Selecione o Álbum (ID) -> ');
    }

}
