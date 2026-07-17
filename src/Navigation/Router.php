<?php

namespace App\Navigation;

use App\Navigation\RouteNames;
use App\Navigation\Navigator;

use App\Presentation\Screens\Abstracts\Screen;

final class Router {
    
    private static ScreenFactory $screenFactory;

    private function __construct() {}

    static public function setFactory(ScreenFactory $factory) : void {

        self::$screenFactory = $factory;

    }

    static public function init(RouteNames $initialRoute) {

        Navigator::start(self::$screenFactory->create($initialRoute));

    }

    static public function goTo(RouteNames $route, mixed ...$params) : void {

        Navigator::push(self::$screenFactory->create($route, ...$params));

    }

    static public function switchTo(RouteNames $route, mixed ...$params) : void {
    
        Navigator::replace(self::$screenFactory->create($route, ...$params));

    }

    static public function goBack(bool $refresh = false) : void {
        Navigator::pop($refresh);
    }
}
