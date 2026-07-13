<?php

namespace App\Repositories;

use App\Models\Album;
use App\IDB\MemoryStorage;

use InvalidArgumentException;

class AlbumMemoryRepository {
    
    public function fetchAll() : array {
        return MemoryStorage::$albuns;
    }

    public function fetchById(int $id) : Album {
        if(!$this->exists($id)) {
            throw new InvalidArgumentException('ID de Álbum não encontrado');
        }

        return MemoryStorage::$albuns[$id];
    }

    private function exists(int $id) {
       return isset(MemoryStorage::$albuns[$id]);
    }
}
