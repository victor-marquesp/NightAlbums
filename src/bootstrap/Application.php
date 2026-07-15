<?php

namespace App\Bootstrap;


use App\Data\Repositories\ExperienceMemoryRepository;
use App\Data\Repositories\AlbumMemoryRepository;

use App\Domain\Services\ExperienceService;
use App\Domain\Services\AlbumService;

use App\Presentation\Controllers\ExperienceController;
use App\Presentation\Controllers\AlbumController;

use App\Presentation\Screens\MainMenuScreen;
// use App\Presentation\Screens\Album\AlbumListScreen;
// use App\Presentation\Screens\Album\AlbumScreen;
// use App\Presentation\Screens\Experience\ExperienceListScreen;
// use App\Presentation\Screens\Experience\ExperienceFormScreen;
// use App\Presentation\Screens\Experience\ExperienceScreen;

use App\Navigation\RouteNames;
use App\Navigation\Router;

class Application {

    public function run() : void{

        $this->build();
        Router::init(RouteNames::MAIN_MENU);

    }

    private function build() : void {

        // Instancia as dependências as dependências

        // Repositórios
        $experienceRepository = new ExperienceMemoryRepository();
        $albumRepository = new AlbumMemoryRepository();

        // Services
        $experienceService = new ExperienceService(
            experienceRep: $experienceRepository,
            albumRep: $albumRepository
        );
        $albumService = new AlbumService($albumRepository);

        // Controllers
        $experienceController = new ExperienceController($experienceService);
        $albumController = new AlbumController($albumService);

        // Screens
        $mainMenuScreen = new MainMenuScreen();

        // $albumListScreen = new AlbumListScreen();
        // $albumScreen = new AlbumScreen();

        // $experienceScreen = new ExperienceScreen();
        // $experienceFormScreen = new ExperienceFormScreen();
        // $experienceListScreen = new ExperienceListScreen();

        // Registra as Rotas

        Router::register(route: RouteNames::MAIN_MENU, screen: $mainMenuScreen);
        // Router::register(route: RouteNames::ALBUM_LIST, screen: $albumListScreen);
        // Router::register(route: RouteNames::ALBUM, screen: $albumScreen);
        // Router::register(route: RouteNames::EXPERIENCE_LIST, screen: $experienceListScreen);
        // Router::register(route: RouteNames::EXPERIENCE_CREATE, screen: $experienceFormScreen);
        // Router::register(route: RouteNames::EXPERIENCE, screen: $experienceScreen);

    }

}
