<?php

namespace App\Repositories;

require 'src/models/album.php';
// require 'src/idb/data.php';

use App\Models\Album;
use App\IDB\Data;

use InvalidArgumentException;

class AlbumMemoryRepository {
    
    public function fetchAll() : array {
        return Data::$albuns;
    }

    public function fetchById(int $id) : Album {
        if(!$this->exists($id)) {
            throw new InvalidArgumentException('ID de Álbum não encontrado');
        }

        return Data::$albuns[$id];
    }

    private function exists(int $id) {
       return isset(Data::$albuns[$id]);
    }
}
