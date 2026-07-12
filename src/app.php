<?php

require 'cli/menu.php';

use App\CLI\Menu;

abstract class App {
    static public function main(...$args) {

        do{
            $option = Menu::displayMenu();
            App::triggerOption($option);
        } while($option != 0);

    }

    static public function triggerOption(int $option) {
        switch ($option) {

            case 0:
                echo "\e[H\e[J";
                readline("Até logo!... ");
                break;
        }
    }
}

App::main();
