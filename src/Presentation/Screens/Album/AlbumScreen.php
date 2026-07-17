<?php

namespace App\Presentation\Screens\Album;

use App\Presentation\Screens\Abstracts\Screen;
use App\Presentation\Controllers\AlbumController;
use App\Presentation\Views\Album\AlbumView;
use App\Presentation\Views\FeedbackView;
use App\Presentation\CLI\Output;

use App\Domain\Models\Album;

use App\Shared\Results\Success;

use App\Navigation\Router;
use App\Navigation\RouteNames;

class AlbumScreen extends Screen {

    private Album $album;

    public function __construct(
            private AlbumController $albumController,
            private int $albumId
        ) {}

    public function load() : bool {

        $result = $this->albumController->listById($this->albumId);

        if(!$this->handle($result)) {
            Router::goBack();
            return false;
        }

        $this->album = $result->data;
        return true;
    }

    public function render() : void {
        
        $option = AlbumView::read($this->album);
        $this->triggerOption($option);

    }

    protected function triggerOption(int $option) : void {

        switch($option) {

            case 1:
                FeedbackView::failure('NÃO IMPLEMENTADO');
                break;

            case 2:
                Router::goTo(RouteNames::EXPERIENCE_CREATE, $this->album->getId());
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
