<?php

namespace App\Presentation\Views;

use App\Presentation\CLI\Output;

final class ExperienceListView {

    private function __construct() {}

    static public function show(array $experiences) {

        Output::clear();

        Output::title('EXPERIÊNCIAS CADASTRADAS');

        if(!ExperienceListView::checkExperiences($experiences)) {
           echo "SEM EXPERIÊNCIAS CADASTRADAS\n"; 
            Output::pause();
            return 0;
        }  
        
        ExperienceListView::displayExperiences();
        echo "Seleciona a Experiência (ID) ou -1 para voltar -> ";

    }

    static private function checkExperiences(array $experiences) : bool {
        return !empty($experiences);
    }

    static private function displayExperiences(array $experiences) {

        foreach($experiences as $id => $experience) {
            echo "[$id] - $experience->getName()\n";
        }

    }   
}
