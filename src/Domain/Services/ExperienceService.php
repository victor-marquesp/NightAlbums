<?php

namespace App\Domain\Services;

use App\Domain\Models\Experience;
use App\Domain\Models\Album;
use App\Shared\DTO\NewExperienceData;
use App\Data\Repositories\Contracts\IExperienceRepository;
use App\Data\Repositories\Contracts\IAlbumRepository;

final class ExperienceService {

    public function __construct(
        private IExperienceRepository $experienceRep, 
        private IAlbumRepository $albumRep
    ) {}

    public function create(NewExperienceData $data) : Experience {

        $album = $this->listAlbum($data->albumId);

        $id = $this->experienceRep->generateId();  

        $experience = new Experience(
            id: $id,
            album: $album,

            mood: $data->mood,
            stars: $data->stars,

            desc: $data?->desc
        );

        $this->experienceRep->save($experience);
        return $experience;
    }

    public function listAll(): array {
        return $this->experienceRep->findAll();
    }   

    public function listById(int $id) : Experience {
        return $this->experienceRep->findById($id);
    }

    public function listByAlbum(int $albumId) {

        $this->listAlbum($albumId);

        return $this->experienceRep->findByAlbum($albumId);

    }   

    public function edit(Experience $experience) : Experience {

        $this->listAlbum($experience->getAlbum()->getId());

        $this->experienceRep->update($experience);
        return $experience;
    }

    public function delete(int $id) : int {
        $this->experienceRep->destroy($id);
        return $id;
    }

    public function listAlbum(int $albumId) : Album {
        return $this->albumRep->findById($albumId);
    }
}
