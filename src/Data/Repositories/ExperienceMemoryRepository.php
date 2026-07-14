<?php

namespace App\Data\Repositories;

use App\Domain\Models\Experience;
use App\Data\IDB\MemoryStorage;
use App\Data\Repositories\Contracts\IExperienceRepository;

use InvalidArgumentException;

final class ExperienceMemoryRepository implements IExperienceRepository {

    public function save(Experience $experience) : void {

        if ($this->exists($experience->getId())) {
            throw new InvalidArgumentException('ID de Experiência já existente');
        }

        MemoryStorage::$experiences[$experience->getId()] = $experience;

    }

    public function findAll() : array {

        return MemoryStorage::$experiences;

    }

    public function findById(int $id) : Experience {

        if(!$this->exists($id)) {
            throw new InvalidArgumentException('ID de Experiência não encontrado');
        }
            
        return MemoryStorage::$experiences[$id];
    }

    public function update(Experience $experience) : void {

        if(!$this->exists($experience->getId())) {
            throw new InvalidArgumentException('ID de Experiência não encontrado');
        }

        MemoryStorage::$experiences[$experience->getId()] = $experience;

    }

    public function destroy(int $id) : void {

        if(!$this->exists($id)) {
            throw new InvalidArgumentException('ID de Experiência não encontrado');
        }

        unset(MemoryStorage::$experiences[$id]);

    }
    
    private function exists(int $id) : bool {    

        return isset(MemoryStorage::$experiences[$id]);

    }
        
    public function generateId() : int {

        return MemoryStorage::nextExperienceId();

    }
}
