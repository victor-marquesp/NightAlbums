<?php

namespace App\Presentation\CLI;

use App\Presentation\CLI\Output;
use App\Presentation\CLI\Input;

final class Render {

    private function construct() {}

    static public function menu(array $options) : void {

        foreach ($options as $number => $text) {
            echo " {$number}. {$text}\n";
        }
        echo "\n";

    }

    public static function list(array $items, callable $formatter) : void {

        foreach ($items as $id => $item) {
            self::listItem($id, $item, $formatter);
        }

    }

    static public function listItem(int $id, mixed $item, callable $formatter) : void {

        echo str_pad($id,3,"0",STR_PAD_LEFT);
        echo " │ ";
        echo $formatter($item);
        echo "\n";
        
    }

    static public function entity(array $fields) : void {
        
        foreach($fields as $field => $value) {
            echo "$field" .($value ?? "-") ."\n";
        }

    }

    static public function table() {
        
    }
}