<?php

namespace App\Presentation\Controllers;

use App\Domain\Services\AlbumService;
use App\Domain\DTO\NewAlbumData;
use App\Domain\Models\Album;

use App\Shared\Results\Result;
use App\Shared\Results\Success;
use App\Shared\Results\Failure;

use Exception;

class AlbumController {

    public function __construct(private AlbumService $albumServ) {}

    public function create(NewAlbumData $albumData) : Result {
        try {

            $data = $this->albumServ->create($albumData);
            return new Success(
                data: $data,
                message: 'Álbum criado'
            );

        } catch(Exception $e) {
            return new Failure(message: 'Falha ao criar Álbum');
        }
    }

    public function listAll() : Result {
        try {

            $data = $this->albumServ->listAll();
            return new Success(
                data: $data,
                message: 'Todos os Álbuns retornados'
            );

        } catch(Exception $e) {
            return new Failure(message: 'Falha ao listar todos os Álbuns');
        } 
    }

    public function listById(int $id) : Result {
        try {

            $data = $this->albumServ->listById($id);
            return new Success(
                data: $data,
                message: 'Álbum encontrado'
            );

        } catch(Exception $e) {
            return new Failure(message: 'Falha ao listar Álbum');
        }
    }

    public function edit(Album $album) : Result {
        try { 
            $data = $this->albumServ->edit($album);;
            return new Success(
                data: $data,
                message: 'Álbum editado com sucesso'
            );
        } catch(Exception $e) {
            return new Failure(message: 'Falha ao editar Álbum');
        }
        
    }

    public function delete(int $id) : Result {
        try {
            $data = $this->albumServ->delete($id);
            return new Success(
                data: $data,
                message: 'Álbum deletado com sucesso'
            );
        } catch(Exception $e) {
            return new Failure(message: 'Falha ao deletar Álbum');
        }
    }
}