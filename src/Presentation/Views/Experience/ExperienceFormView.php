<?php

namespace App\Presentation\Views\Experience;

use App\Presentation\CLI\Output;
use App\Presentation\CLI\Input;
use App\Presentation\CLI\Render;

use App\Shared\DTO\ExperienceFormData;

final class ExperienceFormView {

    private function __construct() {}

    static public function read() {
        
        Output::clear();
        Output::header('CRIAÇÃO DE EXPERIÊNCIA');

        
        $mood = Input::word('Se você pudesse descrever esse Álbum em  uma palavra... qual seria -> ');
        $stars = Input::decimal('Quantas estrelas você dá para esse Álbum (0 - 5) -> ');
        $desc = Input::text('Descreva sua experiência com esse Álbum (opcional) -> ');

        return new ExperienceFormData(
            mood: $mood,
            stars: $stars,
            desc: $desc 
        );

    }

}
