<?php

namespace App\Presentation\CLI;

final class Output {

    private function __construct() {}

    static public function separator() {
        echo "──────────────────────────────────────────────────────\n";
    }

    static public function title(
            string $title = 'NightAlbums',
            string $subtitle = 'your personal album journal'
        ) : void {

        self::clear();
        self::separator();
        echo "                ☾ $title\n";
        echo "          $subtitle\n";
        self::separator();
        echo "\n";
    }

    static public function header(string $header) : void {
        echo "● {$header}\n";
        echo "──────────────────────────────────────────────────────\n";
    }

    static public function goodbye() : void {
        echo "\n";
        echo "☾ Até a próxima.\n";
        echo "Obrigado por registrar suas noites musicais.\n\n";
    }

    static public function success(string $message) : void {
        echo "\n";
        echo "✓ {$message}\n\n";
    }

    static public function failure(string $message) : void {
        echo "\n";
        echo "✗ {$message}\n\n";
    }

    static public function empty($message) : void {
        echo "\n";
        echo "○ 🕳️ Oops... {$message}\n\n";
    }

    static public function pause() : void {
        readline("Pressione Enter para continuar...");
    }

    static public function clear() : void {
        echo "\e[H\e[J";
    }

}