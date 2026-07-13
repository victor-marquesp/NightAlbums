<?php

namespace App\Presentation\Views;

use App\Presentation\CLI\Output;

final class AlbumListView {

    private function __construct() {}

    static public function show(array $albums) {

        Output::clear();

        Output::title('ÁLBUNS CADASTRADOS');

        if(!AlbumListView::checkAlbums($albums)) {
           echo "SEM ÁLBUNS CADASTRADOS\n"; 
           Output::pause();
           return 0;
        }
        
        AlbumListView::displayAlbums();
        echo "Seleciona o Álbum (ID) ou -1 para voltar -> ";

    }

    static private function checkAlbums(array $albums) : bool {
        return !empty($albums);
    }

    static private function displayAlbums(array $albums) {

        foreach($albums as $id => $album) {
            echo "[$id] - $album->getName()\n";
        }

    }   
}
