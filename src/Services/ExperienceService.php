<?php

namespace App\Services;

use App\Models\Experience;
use App\Models\Album;
use App\DTO\NewExperienceData;
use App\Repositories\ExperienceMemoryRepository;
use App\Repositories\AlbumMemoryRepository;

class ExperienceService {

    public function __construct(
        private ExperienceMemoryRepository $experienceRep, 
        private AlbumMemoryRepository $albumRep
    ) {}

    public function create(NewExperienceData $data) : void {

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
    }

    public function findAll(): array {
        return $this->experienceRep->fetchAll();
    }   

    public function findById(int $id) : Experience {
        return $this->experienceRep->fetchById($id);
    }

    public function edit(Experience $experience) {

        $this->validateAlbum($experience->getAlbum());

        $this->experienceRep->update($experience);
    }

    public function delete(int $id) : void {
        $this->experienceRep->destroy($id);
    }

    private function validateAlbum(Album $album) {
        $this->albumRep->fetchById($album->getId());
    }
}
