<?php

namespace App\Bootstrap;


use App\Data\Repositories\ExperienceMemoryRepository;
use App\Data\Repositories\AlbumMemoryRepository;

use App\Domain\Services\ExperienceService;

use App\Presentation\Controllers\ExperienceController;
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

        $experienceController = new ExperienceController($experienceService);
        $this->menu = new Menu($experienceController);
    }

}
