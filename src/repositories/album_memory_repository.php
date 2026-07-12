<?php

namespace App\Repositories;

require 'src/models/album.php';

use App\Models\Album;

use InvalidArgumentException;

class AlbumMemoryRepository {
    
    public function findAll() : array {
        return Data::$albums;
    }

    public function findById(int $id) : Album {
        if(!$this->exists($id)) {
            throw new InvalidArgumentException('ID de Álbum não encontrado');
        }
    }

    private function exists(int $id) {
       return isset(Data::$albuns[$id]);
    }
}
