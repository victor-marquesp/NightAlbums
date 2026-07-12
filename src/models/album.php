<?php

namespace App\Models;

class Album {
    private string $name;
    private string $desc;
    private string $artist;
    private string $genre;
    private int $duration;

    public function __construct(string $name, string $desc, string $artist, string $genre, int $duration) {

        $this->name = $name;
        $this->desc = $desc;
        $this->artist = $artist;
        $this->genre = $genre;
        $this->duration = $duration;

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