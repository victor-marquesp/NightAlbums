<?php

namespace App\Presentation\Views\Experience;

use App\Presentation\CLI\Output;
use App\Presentation\CLI\Render;
use App\Presentation\CLI\Input;

use App\Domain\Models\Experience;

use App\Shared\DTO\ListScreenData;

final class ExperienceListView {

    private function __construct() {}

    static public function read(array $experiences) : ListScreenData {
        
        Output::clear();
        Output::header('Experiências Cadastradas');

        if (empty($experiences)) {

            Output::empty('Sem Álbuns Cadastrados');
            $menu = [
                0 => 'Voltar'
            ];

        } else {

            Render::list(
                $experiences,
                fn (Experience $e) =>
                    $e->getAlbum()->getName()
                    . ' | '
                    . substr($e->getDesc() ?? '', 0, 20)
                    . ' | '
                    . $e->getMood()
            );

            $menu = [
                1 => 'Visualizar Experiência',
                0 => 'Voltar'
            ];
        }

        Output::separator();
        Render::menu($menu);
        Output::separator();

        $option = Input::number('Digite sua opção -> ');
        $experienceId = 0;

        if ($option == 1) {
            $experienceId = Input::number('Selecione a Experiência (ID) -> ');
        }

        return new ListScreenData(option: $option, id: $experienceId);
    }

}
