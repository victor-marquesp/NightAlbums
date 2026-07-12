<?php

namespace App\Models;

class Album {
    private string $name;
    private string $desc;
    private string $artist;
    private string $genre;
    private int $duration;

    public function __construct(string $name, string $desc, string $artist, string $genre, int $duration) {

        $this->setName($name);
        $this->setDesc($desc);
        $this->setArtist($artist);
        $this->setGenre($genre);
        $this->setDuration($duration);

    }

    // ===========================================================================================================
    // GETTERS E SETTERS
    // ===========================================================================================================    

    public function setName(string $name) : bool {
         $this->name = $name;
         return true;
    }

    public function setDesc(string $desc) : bool {
         $this->desc = $desc;
         return true;
    }

    public function setArtist(string $artist) : bool {
         $this->artist = $artist;
         return true;
    }

    public function setGenre(string $genre) : bool {
         $this->genre = $genre;
         return true;
    }

    public function setDuration(int $duration) : bool {
         $this->duration = $duration;
         return true;
    }

    public function getName() : string {
        return $this->name;
    }   

    public function getDesc() : string {
        return $this->desc;
    }   

    public function getArtist() : string {
        return $this->artist;
    }   

    public function getGenre() : string {
        return $this->genre;
    }   

    public function getDuration() : int {
        return $this->duration;
    }   
}