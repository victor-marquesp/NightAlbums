<?php

namespace App\Domain\DTO;

class NewAlbumData {
    public function __construct(
        public readonly string $name,
        public int $duration,
        public readonly ?string $desc,
        public readonly ?string $artist,
        public readonly ?string $genre,
    ) {}
}
