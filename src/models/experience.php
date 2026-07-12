<?php

namespace App\Models;

use App\Models\Album;

class Experience {
    private Album $album;
    private string $desc;
    private string $mood;
    private float $stars;

    public function __construct(Album $album, string $desc, string $mood, float $stars) {
        $this->album = $album;
        $this->desc = $desc;
        $this->mood = $mood;
        $this->stars = $stars;
    }

    public function getAlbum() : Album {
        return $this->album;
    }

    public function getDesc() : string {
        return $this->desc;
    }

    public function getmood() : string {
        return $this->mood;
    }

    public function getStars() : float {
        return $this->stars;
    }
}

