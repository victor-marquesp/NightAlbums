<?php

namespace App\Repositories;

use App\Models\Experience;
use App\IDB\MemoryStorage;

use InvalidArgumentException;

class ExperienceMemoryRepository {

    public function save(Experience $experience) : void {

        if ($this->exists($experience->getId())) {
            throw new InvalidArgumentException('ID de Experiência já existente');
        }

        MemoryStorage::$experiences[$experience->getId()] = $experience;

    }

    public function fetchAll() : array {

        return MemoryStorage::$experiences;

    }

    public function fetchById(int $id) : Experience {

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
