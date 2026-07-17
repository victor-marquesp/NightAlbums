<?php

namespace App\Navigation;

use SplStack;

use App\Presentation\Screens\Abstracts\Screen;

final class Navigator {

    static private SplStack $stack;
    static private bool $running = false;
    
    private function __construct() {}

    static public function start(Screen $initialScreen) : void {
        
        self::$stack = new SplStack();
        self::$running = true;
        self::$stack->push($initialScreen);

        while(self::$running && !self::$stack->isEmpty()) {
            
            self::$stack->top()->run();

        }
        self::$running = false;
        
    }

    static public function push(Screen $screen) : void {

        if(self::$running) {
            self::$stack->push($screen);
        }

    }

    static public function pop() : void {

        if(self::$running) {
            self::$stack->pop();
            self::$stack->current()?->invalidate();
        }

    }

    static public function replace(Screen $screen) : void {

        if(self::$running) {
            self::$stack->pop();
            self::$stack->push($screen);
        }

    }

    static public function isRunning() : bool {

        return self::$running;

    }

    private static function current(): ?Screen {

        if (self::$stack->isEmpty()) {
            return null;
        }

        return self::$stack->top();
    }

}
