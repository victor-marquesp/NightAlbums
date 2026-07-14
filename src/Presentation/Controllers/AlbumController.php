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

    public function create(NewAlbumData $albumData) : void {
        $this->albumServ->create($albumData);
    }

    public function listAll() : array {
        return $this->albumServ->listAll();
    }

    public function listById(int $id) : Album {
        return $this->albumServ->listById($id);
    }

    public function edit(Album $album) : void {
        $this->albumServ->edit($album);
    }

    public function delete(int $id) : void {
        $this->albumServ->delete($id);
    }
}