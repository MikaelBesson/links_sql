<?php


namespace Mika\App\Classes\Controller;
use Mika\App\Classes\RenderController;

class ErrorController extends RenderController
{
    /**
     * Display a html error message view width $string message
     * @param string $string
     */
    public function showError(string $string)
    {
        $this->render('error', $string);
    }

}