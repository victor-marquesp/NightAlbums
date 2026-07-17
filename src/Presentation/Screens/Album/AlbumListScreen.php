<?php

namespace App\Presentation\Screens\Album;

use App\Presentation\Screens\Abstracts\Screen;
use App\Presentation\Controllers\AlbumController;
use App\Presentation\Views\Album\AlbumListView;
use App\Presentation\Views\FeedbackView;
use App\Presentation\CLI\Output;

use App\Shared\Results\Success;
use App\Shared\DTO\ListScreenData;

use App\Navigation\Router;
use App\Navigation\RouteNames;

class AlbumListScreen extends Screen {

    private array $albums;

    public function __construct(private AlbumController $albumController) {}

    public function load() : bool {

        $result = $this->albumController->listAll();

        if(!$this->handle($result)) {
            Router::goBack();
            return false;
        }

        $this->albums = $result->data;
        return true;
    }

    protected function render(): void {
        $result = AlbumListView::read($this->albums);
        $this->triggerOption($result);
    }

    protected function triggerOption(ListScreenData $result) : void {

        switch($result->option) {

            case 1:
                Router::goTo(RouteNames::ALBUM, $result->id);
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
