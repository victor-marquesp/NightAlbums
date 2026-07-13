<?php

namespace App\Presentation\CLI;

use App\Presentation\Views\MenuView;
use App\Presentation\CLI\Input;
use App\Presentation\CLI\Output;
use App\Presentation\Controllers\ExperienceController;
use App\Presentation\Controllers\AlbumController;

class Menu {

    public function __construct(
        private ExperienceController $expControll, 
        private AlbumController $albumControll
    ) {}

    public function runMenu() {
        do {

            MenuView::show();
            $option = Input::number();
            $this->triggerMenuOption($option);

        } while($option != 0);
    }

    private function triggerMenuOption(int $option) {

        switch ($option) {

            case 1:
                $this->albumControll->listAll();
                break;

            case 2:
                $this->expControll->listAll();
                break;

            case 0:
                Output::clear();
                Output::goodbye();
                Output::pause();
                break;

            default:
                Output::error('OPÇÃO DE MENU INVÁLIDA');
                Output::pause();
                break;
        }
    }

}