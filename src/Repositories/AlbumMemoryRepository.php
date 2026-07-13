<?php

namespace App\Repositories;

use App\Models\Album;
use App\IDB\MemoryStorage;
use App\Repositories\IAlbumRepository;

use InvalidArgumentException;

class AlbumMemoryRepository implements IAlbumRepository {

    public function save(Album $album) : void {
        
    }
    
    public function findAll() : array {
        return MemoryStorage::$albuns;
    }

    public function findById(int $id) : Album {
        if(!$this->exists($id)) {
            throw new InvalidArgumentException('ID de Álbum não encontrado');
        }

        return MemoryStorage::$albuns[$id];
    }

    public function update(Album $album) : void {

    }

    public function destroy(int $id) : void {

    }

    private function exists(int $id) {
       return isset(MemoryStorage::$albuns[$id]);
    }
}
