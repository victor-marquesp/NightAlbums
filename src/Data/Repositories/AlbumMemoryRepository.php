<?php

namespace App\Data\Repositories;

use App\Domain\Models\Album;
use App\Data\IDB\MemoryStorage;
use App\Data\Repositories\IAlbumRepository;

use InvalidArgumentException;

final class AlbumMemoryRepository implements IAlbumRepository {

    public function save(Album $album) : void {

        if ($this->exists($album->getId())) {
            throw new InvalidArgumentException('ID de Álbum já existente');
        }

        MemoryStorage::$albums[$album->getId()] = $album;
    }
    
    public function findAll() : array {
        return MemoryStorage::$albums;
    }

    public function findById(int $id) : Album {
        if(!$this->exists($id)) {
            throw new InvalidArgumentException('ID de Álbum não encontrado');
        }

        return MemoryStorage::$albums[$id];
    }

    public function update(Album $album) : void {
        
        if(!$this->exists($album->getId())) {
            throw new InvalidArgumentException('ID de Álbum não encontrado');
        }

        MemoryStorage::$albums[$album->getId()] = $album;
    }

    public function destroy(int $id) : void {

        if(!$this->exists($id)) {
            throw new InvalidArgumentException('ID de Álbum não encontrado');
        }

        unset(MemoryStorage::$albums[$id]);

    }

    public function generateId() : int {

        return MemoryStorage::nextAlbumId();

    }

    private function exists(int $id) {
       return isset(MemoryStorage::$albums[$id]);
    }
}
