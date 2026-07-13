<?php

namespace App\Data\Repositories;

use App\Domain\Models\Experience;

interface IExperienceRepository {

    public function save(Experience $experience) : void;
    
    public function findAll() : array;

    public function findById(int $id) : Experience;

    public function update(Experience $experience) : void;

    public function destroy(int $id) : void;
}