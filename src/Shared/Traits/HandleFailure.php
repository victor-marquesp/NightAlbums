<?php

namespace App\Shared\Traits;

use App\Shared\Results\Result;
use App\Shared\Results\Success;

use App\Presentation\Views\FeedbackView;

trait HandleFailure {
    protected function handle(Result $result): bool {

        if ((!$result instanceof Success)) {
            FeedbackView::failure($result->message);
            return false;
        }

        return true;

    }
}
