<?php

namespace App\Shared\DTO;

class ListScreenData {

    public function __construct(
        public readonly int $option,
        public readonly ?int $id = null,
    ) {}

}