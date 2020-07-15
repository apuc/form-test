<?php


namespace App\Controllers;


use App\Core\Controller;

class ErrorController extends Controller
{
    public function actionError()
    {
        return $this->render();
    }

    protected function init()
    {
        $this->layout = 'error';
        $this->view = 'errors/error_page';
    }
}