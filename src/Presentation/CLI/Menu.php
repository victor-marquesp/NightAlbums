<?php

namespace App\Presentation\CLI;

use App\Presentation\Views\MenuView;
use App\Presentation\CLI\Input;
use App\Presentation\CLI\Output;
use App\Presentation\Controllers\ExperienceController;

class Menu {

    public function __construct(public ExperienceController $expControll) {}

    public function runMenu() {
        do {

            $this->displayMenu();
            $option = Input::number();
            $this->triggerMenuOption($option);

        } while($option != 0);
    }

    private function displayMenu() {
        MenuView::show();
    }

    private function triggerMenuOption(int $option) {

        switch ($option) {

            case 1:
                Output::success('OPTION 1 TRIGGERED');
                Output::pause();
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