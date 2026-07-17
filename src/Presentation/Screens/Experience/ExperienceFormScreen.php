<?php

namespace App\Presentation\Screens\Experience;

use App\Navigation\Router;

use App\Presentation\Screens\Abstracts\Screen;

use App\Presentation\Controllers\ExperienceController;
use App\Presentation\Views\Experience\ExperienceFormView;
use App\Presentation\Views\FeedbackView;

use App\Shared\DTO\NewExperienceData;
use App\Shared\DTO\ExperienceFormData;
use App\Shared\Results\Success;

class ExperienceFormScreen extends Screen {

    public function __construct(
            private ExperienceController $experienceController,
            private int $albumId
        ) {}

    public function render() : void {
        
        $form = ExperienceFormView::read();
        $this->triggerAction($form);

    }

    protected function triggerAction(ExperienceFormData $form) : void {

        $experienceData = new NewExperienceData(
            albumId: $this->albumId,
            mood: $form->mood,
            stars: $form->stars,
            desc: $form->desc,
        );
        
        $result = $this->experienceController->create($experienceData);

        if(!$result instanceof Success) {
            FeedbackView::failure($result->message);
            Router::goBack();
            return;
        }

        FeedbackView::success('Experiência criada com sucesso');
        Router::goBack(refresh: true);
    }

}
