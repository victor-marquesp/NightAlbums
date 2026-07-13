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
        try {
            $this->expService->create($expData);
        } catch(InvalidArgumentException $e) {
            Output::error($e->get_message);
            Output::pause();
        }  
    }

    public function listAll() : array {
        return $this->expService->listAll();
    }

    public function listById(int $id) : Experience {
        try {
            return $this->expService->listById($id);
        } catch (InvalidArgumentException $e) {
            Output::error($e->get_message);
            Output::pause();
        }
    }

    public function edit(Experience $experience) : void {
        try {
            $this->expService->edit($experience);
        } catch(InvalidArgumentException $e) {
            Output::error($e->get_message);
            Output::pause();
        } 
    }

    public function delete(int $id) : void {
        try {
            $this->expService->delete($id);
        } catch (InvalidArgumentException $e) {
            Output::error($e->get_message);
            Output::pause();
        }
    }
}