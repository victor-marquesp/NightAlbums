<?php

namespace App\Data\Repositories;

use App\Domain\Models\Album;
use App\Data\IDB\MemoryStorage;
use App\Data\Repositories\IAlbumRepository;

use InvalidArgumentException;

final class AlbumMemoryRepository implements IAlbumRepository {

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
