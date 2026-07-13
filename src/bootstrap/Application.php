<?php

namespace App\Bootstrap;


use App\Data\Repositories\ExperienceMemoryRepository;
use App\Data\Repositories\AlbumMemoryRepository;

use App\Domain\Services\ExperienceService;
use App\Domain\Services\AlbumService;

use App\Presentation\Controllers\ExperienceController;
use App\Presentation\Controllers\AlbumController;

use App\Presentation\CLI\Menu;

class Application {

    private Menu $menu;

    public function run() {
        $this->build();
        $this->menu->runMenu(); 
    }

    private function build() {

        // Injeta as dependências

        $experienceRepository = new ExperienceMemoryRepository();
        $albumRepository = new AlbumMemoryRepository();

        $experienceService = new ExperienceService(
            experienceRep: $experienceRepository,
            albumRep: $albumRepository
        );
        $albumService = new AlbumService($albumRepository);

        $experienceController = new ExperienceController($experienceService);
        $albumController = new AlbumController($albumService);

        $this->menu = new Menu(
            expControll: $experienceController,
            albumControll: $albumController
        );
    }

}
