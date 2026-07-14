<?php

namespace App\Presentation\Controllers;

use App\Domain\Services\ExperienceService;
use App\Domain\DTO\NewExperienceData;
use App\Domain\Models\Experience;

use App\Shared\Results\Result;
use App\Shared\Results\Success;
use App\Shared\Results\error;

use Exception;

class ExperienceController {

    public function __construct(private ExperienceService $expService) {}

    public function create(NewExperienceData $expData) : Result {
        try {

            $data = $this->expService->create($expData);
            return new Success(
                data: $data,
                message: 'Experiência criada'
            );

        } catch(Exception $e) {
            return new Failure('Falha ao criar Experiência');
        }
    }

    public function listAll() : Result {
        try{
            $data = $this->expService->listAll();
            return new Success(
                data: $data,
                message: 'Todas as Experiências retornadas'
            );

        } catch(Exception $e) {
            return new Failure('Falha ao listar Experiências');
        }
    }

    public function listById(int $id) : Result {
        try {
            $data = $this->expService->listById($id);
            return new Success(
                data: $data,
                message: 'Experiência encontrada'
            );

        } catch(Exception $e) {
            return new Failure('Falha ao listar Experiência');
        }
    }

    public function edit(Experience $experience) : Result {
        try {
            $data = $this->expService->edit($experience);
            return new Success(
                data: $data,
                message: 'Experiência atualizada'
            );

        } catch(Exception $e) { 
            return new Failure('Falha ao editar Experiência'); 
        }
    }

    public function delete(int $id) : Result {
        try {
            $data = $this->expService->delete($id);
            return new Success(
                data: $data,
                message: 'Experiência deletada'
            );

        } catch(Exception $e) { 
            return new Failure('Falha ao deletar Experiência');
        }
    }
}