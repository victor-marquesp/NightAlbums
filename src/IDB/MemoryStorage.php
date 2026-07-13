<?php

namespace App\IDB;

abstract class MemoryStorage {

    static private int $experienceId = 0;

    static private int $albumId = 0;

    static public array $experiences = [
        
    ];
    
    static public array $albuns = [
        
    ];

    static public function nextExperienceId() : int {
        return MemoryStorage::$experienceId++;
    }

    static public function nextAlbumId() : int {
        return MemoryStorage::$albumId++;
    }
}

