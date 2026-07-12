<?php

namespace App\Models;

use App\Models\Album;

use InvalidArgumentException;

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

    private function setAlbum(Album $album) {
        $this->album = $album;
    }

    private function setDesc(string $desc) {
        $this->desc = $desc;
    }

    private function setMood(string $mood) {
        if(mb_strlen($mood) > 120 ) {
            throw new InvalidArgumentException("Palavra Muito Grande (Mood de Experience)");
        }

        $this->mood = $mood;
    }

    private function setStars(float $stars) {
        if($stars < 0 || $stars > 10) {
            throw new InvalidArgumentException("Estrelas devem estar no intervalo de 0 - 10");
        }

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

