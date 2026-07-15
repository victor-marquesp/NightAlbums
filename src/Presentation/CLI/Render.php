<?php

namespace App\Presentation\CLI;

use App\Presentation\CLI\Output;
use App\Presentation\CLI\Input;

final class Render {

    private function construct() {}

    static public function menu(array $options) {

        foreach($options as $number => $text) {
            echo "($number) - { $text } \n";
        }

    }

    public static function list(array $items, callable $formatter): void
    {

        foreach ($items as $id => $item) {
            self::listItem($id, $item, $formatter);
        }

    }

    static public function listItem(int $id, mixed $item, callable $formatter) : void {

        echo "[$id] - " . $formatter($item) . "\n";
        
    }

    static public function entity(array $fields) {
        
        foreach($fields as $field => $value) {
            echo "[$field]: " .($value ?? 'Sem Valor')  ."\n";
        }

    }

    static public function table() {
        
    }
}