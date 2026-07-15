<?php

namespace App\Domain\Services;

use App\Domain\Models\Experience;
use App\Domain\Models\Album;
use App\Domain\DTO\NewExperienceData;
use App\Data\Repositories\Contracts\IExperienceRepository;
use App\Data\Repositories\Contracts\IAlbumRepository;

final class ExperienceService {

    public function __construct(
        private IExperienceRepository $experienceRep, 
        private IAlbumRepository $albumRep
    ) {}

    public function create(NewExperienceData $data) : Experience {

        $this->validateAlbum($data->album);

        $id = $this->experienceRep->generateId();  


        $experience = new Experience(
            id: $id,
            album: $data->album,

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

    public function edit(Experience $experience) : Experience {

        $this->validateAlbum($experience->getAlbum());

        $this->experienceRep->update($experience);
        return $experience;
    }

    public function delete(int $id) : int {
        $this->experienceRep->destroy($id);
        return $id;
    }

    private function validateAlbum(Album $album) {
        $this->albumRep->findById($album->getId());
    }
}
