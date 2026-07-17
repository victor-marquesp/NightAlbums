<?php

namespace App\Presentation\Views;

use App\Presentation\CLI\Output;
use App\Presentation\CLI\Input;

use App\Shared\Results\Success;
use App\Shared\Results\Failure;

final class FeedbackView {
    
    private function __construct() {}

    static public function success(string $message = 'Sem informação') {
        Output::clear();
        Output::success($message);
        Output::pause();
    }

    static public function failure(string $message = 'Sem Informação') {
        Output::clear();
        Output::failure($message);
        Output::pause();
    }

    static public function confirm(?string $display = null) : bool {
        return Input::confirm($display);
    }

    static public function exit() {
        Output::clear();
        Output::goodbye();
        Output::pause();
    }

}
