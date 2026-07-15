<?php

namespace App\Data\IDB;

final class MemoryStorage {

    static private int $experienceId = 0;

    static private int $albumId = 0;

    private function __construct() {}

    static public array $experiences = [
        
    ];
    
    static public array $albums = [
        
    ];

    static public function nextExperienceId() : int {
        return self::$experienceId++;
    }

    static public function nextAlbumId() : int {
        return self::$albumId++;
    }
}

