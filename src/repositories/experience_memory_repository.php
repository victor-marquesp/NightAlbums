<?php

namespace App\Repositories;

require 'src/models/experience.php';
require 'src/idb/data.php';

use App\Models\Experience;
use App\IDB\Data;

use InvalidArgumentException;

class ExperienceMemoryRepository {

    public function save(Experience $experience) : void {

        if ($this->exists($experience->getId())) {
            throw new InvalidArgumentException('ID de Experiência já existente');
        }

        Data::$experiences[$experience->getId()] = $experience;

    }

    public function findAll() : array {

        return Data::$experiences;

    }

    public function findById(int $id) : Experience {

        if(!$this->exists($id)) {
            throw new InvalidArgumentException('ID de Experiência não encontrado');
        }
            
        return Data::$experiences[$id];
    }

    public function update(Experience $experience) : void {

        if(!$this->exists($experience->getId())) {
            throw new InvalidArgumentException('ID de Experiência não encontrado');
        }

        Data::$experiences[$experience->getId()] = $experience;

    }

    public function delete(int $id) : void {

        if(!$this->exists($id)) {
            throw new InvalidArgumentException('ID de Experiência não encontrado');
        }

        unset(Data::$experiences[$id]);

    }
    
    private function exists(int $id) : bool {    

        return isset(Data::$experiences[$id]);

    }
        
    public function generateId() : int {

        return Data::nextExperienceId();

    }
}
