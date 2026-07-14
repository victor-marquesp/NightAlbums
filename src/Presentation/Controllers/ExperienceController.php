<?php

namespace App\Presentation\Controllers;

use App\Domain\Services\ExperienceService;
use App\Domain\DTO\NewExperienceData;
use App\Domain\Models\Experience;

use App\Presentation\CLI\Output;

use InvalidArgumentException;

class ExperienceController {

    public function __construct(private ExperienceService $expService) {}

    public function create(NewExperienceData $expData) : void {
        $this->expService->create($expData);
    }

    public function listAll() : array {
        return $this->expService->listAll();
    }

    public function listById(int $id) : Experience {
        return $this->expService->listById($id);
    }

    public function edit(Experience $experience) : void {
        $this->expService->edit($experience);
    }

    public function delete(int $id) : void {
        $this->expService->delete($id);
    }
}