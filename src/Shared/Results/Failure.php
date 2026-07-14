<?php

namespace App\Shared\Results;

use App\Shared\Results\Result;

final class Failure extends Result {
    public function __construct(
        public readonly string $message
    ) {}
}