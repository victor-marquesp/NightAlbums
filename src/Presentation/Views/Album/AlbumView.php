<?php

namespace App\Presentation\Views\Album;

use App\Presentation\CLI\Output;
use App\Presentation\CLI\Render;
use App\Presentation\CLI\Input;

use App\Domain\Models\Album;

final class AlbumView {

    private function __construct() {}

    static public function read(Album $album) : int {

        Output::clear();
        Output::header('Visualização de Álbum');

        Render::entity([
            'ID' => $album->getId(),
            'Nome' => $album->getName(),
            'Duração' => $album->getDuration(),
            'Descrição' => $album->getDesc(),
            'Artista' => $album->getArtist(),
            'Gênero' => $album->getGenre(),

        ]);

        Output::separator();

        Render::menu([
            1 => 'Listar Experiências do Álbum',
            2 => 'Registrar Nova Experiência',
            0 => 'Voltar'
        ]); 
        

        return Input::number('Digite sua opção -> ');
    }
}
