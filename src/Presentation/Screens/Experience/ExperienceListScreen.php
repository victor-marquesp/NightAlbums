<?php

namespace App\Presentation\Screens\Experience;

use App\Presentation\Screens\Abstracts\Screen;
use App\Presentation\Controllers\ExperienceController;
use App\Presentation\Views\Experience\ExperienceListView;
use App\Presentation\Views\FeedbackView;
use App\Presentation\CLI\Output;

use App\Shared\Results\Success;
use App\Shared\DTO\ListScreenData;

use App\Navigation\Router;
use App\Navigation\RouteNames;

class ExperienceListScreen extends Screen {

    private array $experiences;

    public function __construct(private ExperienceController $experienceController) {}

    public function load() : bool {

        $result = $this->experienceController->listAll();

        if(!$this->handle($result)) {
            Router::goBack();
            return false;
        }

        $this->experiences = $result->data;
        return true;
    }

    protected function render(): void {
        $result = ExperienceListView::read($this->experiences);
        $this->triggerOption($result);
    }

    protected function triggerOption(ListScreenData $result) : void {

        switch($result->option) {

            case 1:
                Router::goTo(RouteNames::EXPERIENCE, $result->id);
                break;

            case 0:
                Router::goBack();
                break;

            default:
                FeedbackView::failure('Opção Inválida');
                break;
        }
    }

}
