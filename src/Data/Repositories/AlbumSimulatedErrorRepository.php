<?php

namespace App\Data\Repositories;

use App\Domain\Models\Album;
use App\Data\IDB\MemoryStorage;
use App\Data\Repositories\Contracts\IAlbumRepository;

use InvalidArgumentException;

final class AlbumSimulatedErrorRepository implements IAlbumRepository {

    public function save(Album $album) : Album {

        throw new InvalidArgumentException('ERRO SIMULADO');
    
    }
    
    public function findAll() : array {

        throw new InvalidArgumentException('ERRO SIMULADO');

    }

    public function findById(int $id) : Album {

        throw new InvalidArgumentException('ERRO SIMULADO');
        
    }

    public function update(Album $album) : Album {
        
        throw new InvalidArgumentException('ERRO SIMULADO');
        
    }

    public function destroy(int $id) : int {

        throw new InvalidArgumentException('ERRO SIMULADO');

    }

    public function generateId() : int {

        throw new InvalidArgumentException('ERRO SIMULADO');

    }

}
