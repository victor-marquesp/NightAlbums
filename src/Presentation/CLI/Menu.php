<?php

namespace App\Presentation\CLI;

abstract class Menu {

    static array $options = [1, 2, 0];

    static public function displayMenu() : int {

        Menu::cleanScreen();
        Menu::showMenu();

        $option = (int) readline();

        if(Menu::validateOption($option)) {
            return $option;
        }

        Menu::displayMessage(-1);
        return -1;
    }

    static private function validateOption($option) : bool {

        if(!is_int($option)) {
            return false;
        }

        if(!in_array($option, Menu::$options, true)) {
            return false;
        }

        return true;

    }

    static private function showMenu() : void {
        echo "|-----------------------------------------------------------|\n";
        echo "|    ALBUM NIGHTS - 💽                                     |\n";
        echo "|----------------------------------------------------------|\n";
        echo "(1) - Registrar Experiência\n";
        echo "(2) - Listar Suas Experiências\n";
        echo "(0) - Sair\n";
        echo "------------------------------------------------------------\n";
        echo "Digite sua Opcao -> ";            
    }

    static private function cleanScreen() : void {
        echo "\e[H\e[J";
    }  

    static private function displayMessage(int $message) : void {

        Menu::cleanScreen();

        switch($message) {
            case -1:
                echo "OPÇÃO DE MENU PRINCIPAL INVÁLIDA";
                readline('Digite qualquer coisa para continuar... ');
                break;
        }
    }  

}