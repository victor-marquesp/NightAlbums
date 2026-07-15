<?php

namespace App\Bootstrap;


use App\Data\Repositories\ExperienceMemoryRepository;
use App\Data\Repositories\AlbumMemoryRepository;

use App\Domain\Services\ExperienceService;
use App\Domain\Services\AlbumService;

use App\Presentation\Controllers\ExperienceController;
use App\Presentation\Controllers\AlbumController;

use App\Presentation\Screens\MainMenuScreen;
use App\Presentation\Screens\Album\AlbumListScreen;
use App\Presentation\Screens\Album\AlbumScreen;
use App\Presentation\Screens\Experience\ExperienceListScreen;
// use App\Presentation\Screens\Experience\ExperienceFormScreen;
// use App\Presentation\Screens\Experience\ExperienceScreen;

use App\Navigation\RouteNames;
use App\Navigation\Router;

use App\Domain\DTO\NewAlbumData;
use App\Domain\DTO\NewExperienceData;

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

        $albumListScreen = new AlbumListScreen($albumController);
        $albumScreen = new AlbumScreen($albumController);

        $experienceListScreen = new ExperienceListScreen($experienceController);
        // $experienceFormScreen = new ExperienceFormScreen();
        // $experienceScreen = new ExperienceScreen();

        // Registra as Rotas

        Router::register(route: RouteNames::MAIN_MENU, screen: $mainMenuScreen);
        Router::register(route: RouteNames::ALBUM_LIST, screen: $albumListScreen);
        Router::register(route: RouteNames::ALBUM, screen: $albumScreen);
        Router::register(route: RouteNames::EXPERIENCE_LIST, screen: $experienceListScreen);
        // Router::register(route: RouteNames::EXPERIENCE_CREATE, screen: $experienceFormScreen);
        // Router::register(route: RouteNames::EXPERIENCE, screen: $experienceScreen);

        $this->populate($albumService, $experienceService);

    }

    private function populate($albumService, $experienceService) {


        $albumService->create(new NewAlbumData(
                name: 'The Bends',
                duration: 50,
                desc: 'One of the best of them',
                artist: 'Radiohead',
                genre: 'Alternative Rock'
            )
        );

        $albumService->create(new NewAlbumData(
                name: 'Thriller',
                duration: 60,
                desc: 'Zombies',
                artist: 'Michael Jackson',
                genre: 'Pop'
            )
        );

        $albumService->create(new NewAlbumData(
                name: 'Rust In... Polaris',
                duration: 43,
                artist: 'Megadeth',
                genre: 'Trash Metal'
            )
        );

        $albumService->create(new NewAlbumData(
                name: 'Divino',
                duration: 67,
                artist: 'Venere Vai Venus',
                genre: 'Rock'
            )
        );

        $experienceService->create(new NewExperienceData(
                album: $albumService->listById(0),
                mood: 'spacefull',
                stars: 5,
                desc: 'It sounds like space',
            )
        );

        $experienceService->create(new NewExperienceData(
                album: $albumService->listById(1),
                mood: 'assustador',
                stars: 5,
            )
        );

        $experienceService->create(new NewExperienceData(
                album: $albumService->listById(2),
                mood: 'aggressive',
                stars: 5,
            )
        );

        $experienceService->create(new NewExperienceData(
                album: $albumService->listById(3),
                mood: 'beautyfull',
                stars: 4,
                desc: 'actually didnt listen yet',
            )
        );
    }

}
