<?php

namespace App\Models;

use App\Models\Album;

class Experience {
    private Album $album;
    private string $desc;
    private string $mood;
    private float $stars;

    public function __construct(Album $album, string $desc, string $mood, float $stars) {
        
        $this->setAlbum($album);
        $this->setDesc($desc);
        $this->setMood($mood);  
        $this->setStars($stars);
        
    }

    // ===========================================================================================================
    // GETTERS E SETTERS
    // ===========================================================================================================  

    public function setAlbum(Album $album) : bool {
        $this->album = $album;
        return true;
    }

    public function setDesc(string $desc) : bool {
        $this->desc = $desc;
        return true;
    }

    public function setMood(string $mood) : bool {
        $this->mood = $mood;
        return true;
    }

    public function setStars(float $stars) : bool {
        $this->stars = $stars;
        return true;
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

