<?php

namespace App\Repositories;

use App\Models\Album;

interface IAlbumRepository {

    public function save(Album $album);

    public function findAll() : array;

    public function findById(int $id) : Album;

    public function update(Album $album) : void;

    public function destroy(int $id) : void;
}
