<?php

namespace App\Presentation\Screens\Experience;

use App\Presentation\Screens\Abstracts\Screen;
use App\Presentation\Controllers\ExperienceController;
use App\Presentation\Views\Experience\ExperienceView;
use App\Presentation\Views\FeedbackView;
use App\Presentation\CLI\Output;

use App\Domain\Models\Experience;

use App\Shared\Results\Success;

use App\Navigation\Router;
use App\Navigation\RouteNames;

class ExperienceScreen extends Screen {

    private Experience $experience;

    public function __construct(
            private ExperienceController $experienceController,
            private int $experienceId
        ) {}

    public function load() : bool {

        $result = $this->experienceController->listById($this->experienceId);

        if(!$this->handle($result)) {
            Router::goBack();
            return false;
        }

        $this->experience = $result->data;
        return true;
    }

    public function render() : void {
        
        $option = ExperienceView::read($this->experience);
        $this->triggerOption($option);

    }

    protected function triggerOption(int $option) : void {

        switch($option) {

            case 1:
                FeedbackView::failure('NÃO IMPLEMENTADO');
                break;

            case 2:
                Router::goTo(RouteNames::EXPERIENCE_EDIT, $this->experience->getId());
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
