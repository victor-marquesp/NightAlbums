<?php

namespace App\Data\Repositories\Contracts;

use App\Domain\Models\Experience;

interface IExperienceRepository {

    public function save(Experience $experience) : Experience;
    
    public function findAll() : array;

    public function findById(int $id) : Experience;

    public function update(Experience $experience) : Experience;

    public function destroy(int $id) : int;
}