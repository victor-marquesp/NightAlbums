<?php

namespace App\Shared\DTO;

class NewAlbumData {
    public function __construct(
        public readonly string $name,
        public int $duration,
        public readonly ?string $desc = null,
        public readonly ?string $artist = null,
        public readonly ?string $genre = null,
    ) {}
}
