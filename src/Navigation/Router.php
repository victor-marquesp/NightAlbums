<?php

namespace App\Navigation;

use App\Navigation\RouteNames;
use App\Navigation\Navigator;

use App\Presentation\Screens\Abstracts\Screen;

final class Router {
    private static array $routes = [];

    private function __construct() {}

    public static function register(RouteNames $route, Screen $screen): void {
        self::$routes[$route->value] = $screen;
    }

    private static function resolve(RouteNames $route): Screen {
        return self::$routes[$route->value];
    }

    static public function init(RouteNames $initialRoute) {

        if (!isset(self::$routes[$initialRoute->value])) throw new RuntimeException('ROTA NÃO REGISTRADA'); 

        Navigator::start(self::resolve($initialRoute));
    }

    static public function goTo(RouteNames $route): void {

        if (!isset(self::$routes[$route->value])) throw new RuntimeException('ROTA NÃO REGISTRADA'); 

        Navigator::push(self::resolve($route));
    }

    static public function switchTo(RouteNames $route): void {

        if (!isset(self::$routes[$route->value])) throw new RuntimeException('ROTA NÃO REGISTRADA'); 
    
        Navigator::replace(self::resolve($route));
    }

    static public function goBack(): void {
        Navigator::pop();
    }
}
