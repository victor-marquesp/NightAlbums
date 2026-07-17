<?php

namespace App\Presentation\Views\Album;

use App\Presentation\CLI\Output;
use App\Presentation\CLI\Render;
use App\Presentation\CLI\Input;

use App\Domain\Models\Album;

final class AlbumListView {

    private function __construct() {}

    static public function read(array $albums): array {
        Output::clear();
        Output::header('Álbuns Cadastrados');

        if (empty($albums)) {

            Output::empty('Sem Álbuns Cadastrados');

            $menu = [
                0 => 'Voltar'
            ];

        } else {

            Render::list(
                $albums,
                fn (Album $a) => $a->getName()
            );

            $menu = [
                1 => 'Visualizar Álbum',
                0 => 'Voltar'
            ];
        }

        Output::separator();

        Render::menu($menu);

        Output::separator();

        $result['option'] = Input::number('Digite sua opção -> ');

        if ($result['option'] === 1) {
            $result['albumId'] = Input::number('Selecione o Álbum (ID) -> ');
        }

        return $result;
    }

}
