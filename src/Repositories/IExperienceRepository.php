<?php

namespace App\Repositories;

use App\Models\Experience;

interface IExperienceRepository {

    public function save(Experience $experience) : void;
    
    public function findAll() : array;

    public function findById(int $id) : Experience;

    public function update(Experience $experience) : void;

    public function destroy(int $id) : void;
}