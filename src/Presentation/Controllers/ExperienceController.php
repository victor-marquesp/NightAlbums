<?php

namespace App\Presentation\Controllers;

use App\Domain\Services\ExperienceService;
use App\Domain\DTO\NewExperienceData;
use App\Domain\Models\Experience;

use App\Presentation\CLI\Output;

use App\Presentation\Views\ExperienceListView;

use InvalidArgumentException;

class ExperienceController {

    public function __construct(private ExperienceService $expService) {}

    public function create(NewExperienceData $expData) {
        try {
            $this->expService->create($expData);
            Output::sucess('Experiência criada com sucesso');
        } catch(InvalidArgumentException $e) {
            Output::error($e->get_message);
            Output::pause();
        }  
    }

    public function listAll() {
        ExperienceListView::show($this->expService->listAll());
    }

    public function listById(int $id) {
        try {
            return $this->expService->listById($id);
        } catch (InvalidArgumentException $e) {
            Output::error($e->get_message);
            Output::pause();
        }
    }

    public function edit(Experience $experience) {
        try {
            $this->expService->edit($experience);
            Output::sucess('Experiência editada com sucesso');
        } catch(InvalidArgumentException $e) {
            Output::error($e->get_message);
            Output::pause();
        } 
    }

    public function delete(int $id) : void {
        try {
            $this->expService->delete($id);
            Output::sucess('Experiência deletada com sucesso');
        } catch (InvalidArgumentException $e) {
            Output::error($e->get_message);
            Output::pause();
        }
    }
}