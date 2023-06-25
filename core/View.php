<?php

namespace Core;

class View
{
    static public function render(string $view, $args = []) {
        $file = VIEW_DIR . $view . ".php";

        if(!is_readable($file)) {
            throw new \Exception("File {$file} not found or not readable", 404);
        }

        extract($args, EXTR_SKIP);

        require_once $file;
    }
}