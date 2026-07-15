<?php

namespace App\Domain\Services;

use App\Domain\DTO\NewAlbumData;
use App\Domain\Models\Album;

use App\Data\Repositories\Contracts\IAlbumRepository;

final class AlbumService {

    public function __construct(private IAlbumRepository $albumRep) {}

    public function create(NewAlbumData $data) : Album {

        $id = $this->albumRep->generateId();  

        $album = new Album(
            id: $id,
            name: $data->name,
            duration: $data->duration,

            desc: $data?->desc,
            artist: $data?->artist,
            genre: $data?->genre
        );

        $this->albumRep->save($album);
        return $album;
    }

    public function listAll(): array {
        return $this->albumRep->findAll();
    }   

    public function listById(int $id) : Album {
        return $this->albumRep->findById($id);
    }

    public function edit(Album $album) : Album {

        $this->albumRep->update($album);
        return $album;
    }

    public function delete(int $id) : int {
        $this->albumRep->destroy($id);
        return $id;
    }

}
