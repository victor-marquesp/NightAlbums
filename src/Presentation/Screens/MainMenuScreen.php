<?php

namespace App\Presentation\Screens;

use App\Presentation\Screens\Abstracts\Screen;
use App\Presentation\Views\MainMenuView;

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

                break;

            case 2:
                break;

            case 0:
                break;

            default:
                break;

        }

    }
}
