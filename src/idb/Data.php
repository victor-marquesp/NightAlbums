<?php

namespace App\IDB;

abstract class Data {

    static private int $experienceId = 0;

    static private int $albumId = 0;

    static public array $experiences = [
        
    ];
    
    static public array $albuns = [
        
    ];

    static public function nextExperienceId() : int {
        return Data::$experienceId++;
    }

    static public function nexAlbumId() : int {
        return Data::$albumId++;
    }
}

