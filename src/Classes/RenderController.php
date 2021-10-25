<?php

namespace Mika\App\Classes;

class renderController
{
    public function render(string $view, $data = null) {
        require_once $_SERVER['DOCUMENT_ROOT'] . '/../Views/'.$view.".view.php";
    }
}