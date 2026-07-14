<?php

namespace App\Shared\Results;

use App\Shared\Results\Result;

final class Success extends Result {
    public function __construct(
        public readonly mixed $data = null,
        public readonly ?string $message = null
    ) {}
}
