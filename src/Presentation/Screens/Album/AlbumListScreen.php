<?php

namespace App\Presentation\Screens\Album;

use App\Presentation\Screens\Abstracts\Screen;
use App\Presentation\Controllers\AlbumController;
use App\Presentation\Views\Album\AlbumListView;
use App\Presentation\Views\FeedbackView;
use App\Presentation\CLI\Output;

use App\Shared\Results\Success;

use App\Navigation\Router;
use App\Navigation\RouteNames;

class AlbumListScreen extends Screen {

    public function __construct(private AlbumController $albumController) {}

    public function run() : void {

        $result = $this->albumController->listAll();

        if(!$this->handle($result)) {
            Router::goBack();
            return;
        }

        $option = AlbumListView::read($result->data);
        $this->triggerOption($option);

    }

    protected function triggerOption(int $option) : void {

        switch($option) {

            case 1:
                Router::goTo(RouteNames::ALBUM);
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
