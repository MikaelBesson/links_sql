<?php

namespace Mika\App\Classes;

class renderController
{
    /**
     * @param string $view
     * @param null $data
     * return a view from controller
     */
    public function render(string $view, $data = null) {
        require_once $_SERVER['DOCUMENT_ROOT'] . '/../Views/'.$view.".view.php";
    }
}