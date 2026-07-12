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

    public function getName() {
        return $this->name;
    }   

    public function getDesc() {
        return $this->desc;
    }   

    public function getArtist() {
        return $this->artist;
    }   

    public function getGenre() {
        return $this->genre;
    }   

    public function getDuration() {
        return $this->name;
    }   
}