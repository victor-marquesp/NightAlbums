<?php

namespace App\Domain\DTO;

use App\Domain\Models\Album;

class NewExperienceData {
    public function __construct(
        public readonly Album $album,
        public readonly string $mood,
        public readonly float $stars,
        public readonly ?string $desc
    ) {}
}
