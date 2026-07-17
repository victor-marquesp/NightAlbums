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
        private int $albumId) {}

    public function load() : void {

        $result = $this->albumController->listById($this->albumId);

        if(!$this->handle($result)) {
            Router::goBack();
            return;
        }

        $this->album = $result->data;

    }

    public function run() : void {
        
        $option = AlbumView::read($this->album);
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
                break;
        }
    }

}
