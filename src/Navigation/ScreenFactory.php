<?php

namespace App\Navigation;

use App\Presentation\Controllers\AlbumController;
use App\Presentation\Controllers\ExperienceController;

use App\Presentation\Screens\MainMenuScreen;
use App\Presentation\Screens\Album\AlbumListScreen;
use App\Presentation\Screens\Album\AlbumScreen;
use App\Presentation\Screens\Experience\ExperienceListScreen;
use App\Presentation\Screens\Experience\ExperienceScreen;
use App\Presentation\Screens\Experience\ExperienceCreateScreen;
use App\Presentation\Screens\Experience\ExperienceEditScreen;

use App\Navigation\RouteNames;

final class ScreenFactory {

    public function __construct(
        private AlbumController $albumController,
        private ExperienceController $experienceController,
    ) {}

    public function create(RouteNames $route, mixed...$params) {

        return match($route) {

            RouteNames::MAIN_MENU => new MainMenuScreen(),
            RouteNames::ALBUM_LIST => new AlbumListScreen($this->albumController),
            RouteNames::ALBUM => new AlbumScreen($this->albumController, ...$params),
            RouteNames::EXPERIENCE_ALBUM => new ExperienceListScreen($this->experienceController, ...$params),
            RouteNames::EXPERIENCE_LIST => new ExperienceListScreen($this->experienceController),
            RouteNames::EXPERIENCE => new ExperienceScreen($this->experienceController, ...$params),
            RouteNames::EXPERIENCE_CREATE => new ExperienceCreateScreen($this->experienceController, ...$params),
            RouteNames::EXPERIENCE_EDIT => new ExperienceEditScreen($this->experienceController, ...$params),

        };

    }

}