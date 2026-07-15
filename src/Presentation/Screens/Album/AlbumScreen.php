<?php

namespace App\Presentation\Screens\Album;

use App\Presentation\Screens\Abstracts\Screen;
use App\Presentation\Controllers\AlbumController;
use App\Presentation\Views\Album\AlbumView;
use App\Presentation\Views\FeedbackView;
use App\Presentation\CLI\Output;

use App\Shared\Results\Success;

use App\Navigation\Router;
use App\Navigation\RouteNames;

class AlbumScreen extends Screen {

    public function __construct(private AlbumController $albumController) {}

    public function run() : void {

        $result = $this->albumController->listById(AlbumView::collectId());

        if(!$this->handle($result)) {
            Router::goBack();
            return;
        }

        $option = AlbumView::read($result->data);
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
                FeedbackView::failure('Opção Inválida');
                Router::goBack();
                break;
        }
    }
}
