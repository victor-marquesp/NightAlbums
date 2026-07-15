<?php

namespace App\Presentation\Screens\Experience;

use App\Presentation\Screens\Abstracts\Screen;
use App\Presentation\Controllers\ExperienceController;
use App\Presentation\Views\Experience\ExperienceListView;
use App\Presentation\Views\FeedbackView;
use App\Presentation\CLI\Output;

use App\Shared\Results\Success;

use App\Navigation\Router;
use App\Navigation\RouteNames;

class ExperienceListScreen extends Screen {

    public function __construct(private ExperienceController $experienceController) {}

    public function run() : void {

        $result = $this->experienceController->listAll();

        if(!$this->handle($result)) {
            Router::goBack();
            return;
        }

        $option = ExperienceListView::read($result->data);
        $this->triggerOption($option);

    }

    protected function triggerOption(int $option) : void {

        switch($option) {

            case 1:
                FeedbackView::failure('NÃO IMPLEMENTADO');
                break;

            case 2:
                FeedbackView::failure('NÃO IMPLEMENTADO');
                break;

            case 0:
                Router::goBack();
                break;

            default:
                FeedbackView::failure('Opção inválida');
                break;
        }
    }
}
