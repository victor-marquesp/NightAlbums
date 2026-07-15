<?php

namespace App\Presentation\Screens;

use App\Presentation\Screens\Abstracts\Screen;
use App\Presentation\Views\MainMenuView;
use App\Presentation\CLI\Output;

use App\Navigation\Router;
use App\Navigation\RouteNames;

class MainMenuScreen extends Screen {

    public function __construct() {}

    public function run() : void {

        do {

            $option = MainMenuView::read();
            $this->triggerOption($option);

        } while($option != 0);

    }

    protected function triggerOption(int $option) : void {

        switch($option) {

            case 1:
                Router::goTo(RouteNames::ALBUM_LIST);
                break;

            case 2:
                Router::goTo(RouteNames::EXPERIENCE_LIST);
                break;

            case 0:
                Output::clear();
                Output::goodbye();
                Output::pause();
                Router::goBack();
                break;

            default:
                Output::error('Opção de Menu Inválida');
                break;
        }
    }
}
