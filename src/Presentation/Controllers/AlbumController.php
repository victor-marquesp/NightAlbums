<?php

namespace App\Presentation\Controllers;

use App\Domain\Services\AlbumService;
use App\Domain\DTO\NewAlbumData;
use App\Domain\Models\Album;

use App\Presentation\CLI\Output;

use App\Presentation\Views\AlbumListView;

use InvalidArgumentException;

class AlbumController {

    public function __construct(private AlbumService $albumServ) {}

    public function create(NewAlbumData $albumData) {
        try {
            $this->albumServ->create($albumData);
            Output::sucess('Álbum criado com sucesso');
        } catch(InvalidArgumentException $e) {
            Output::error($e->get_message);
            Output::pause();
        }  
    }

    public function listAll() {
        AlbumListView::show($this->albumServ->listAll());
    }

    public function listById(int $id) {
        try {
            return $this->albumServ->listById($id);
        } catch (InvalidArgumentException $e) {
            Output::error($e->get_message);
            Output::pause();
        }
    }

    public function edit(Album $album) {
        try {
            $this->albumServ->edit($album);
            Output::sucess('Álbum editado com sucesso');
        } catch(InvalidArgumentException $e) {
            Output::error($e->get_message);
            Output::pause();
        } 
    }

    public function delete(int $id) {
        try {
            $this->albumServ->delete($id);
            Output::sucess('Álbum deletado com sucesso');
        } catch (InvalidArgumentException $e) {
            Output::error($e->get_message);
            Output::pause();
        }
    }
}