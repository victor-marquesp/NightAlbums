<?php

namespace App\Domain\Services;

use App\Domain\DTO\NewAlbumData;
use App\Domain\Models\Album;

use App\Data\Repositories\IAlbumRepository;

final class ExperienceService {

    public function __construct(private IAlbumRepository $albumRep) {}

    public function create(NewAlbumData $data) : void {

        $id = $this->albumRep->generateId();  

        $album = new Album(
            id: $id,
            name: $data->name,
            duration: $data->duration,

            desc: $data?->desc,
            artist: $data?->artist,
            genre: $data?->genre
        );

        $this->experienceRep->save($album);
    }

    public function listAll(): array {
        return $this->albumRep->findAll();
    }   

    public function listById(int $id) : Album {
        return $this->albumRep->findById($id);
    }

    public function edit(Album $album) {

        $this->albumRep->update($album);

    }

    public function delete(int $id) : void {
        $this->experienceRep->destroy($id);
    }

}
