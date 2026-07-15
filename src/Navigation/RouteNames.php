<?php

namespace App\Navigation;

enum RouteNames : string {
    case MAIN_MENU = 'menu';
    case ALBUM_LIST = 'albums';
    case ALBUM = 'album';
    case EXPERIENCE_LIST = 'experiences';
    case EXPERIENCE_CREATE = 'new_experience';
    case EXPERIENCE = 'experience';    
}
