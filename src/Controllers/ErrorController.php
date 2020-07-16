<?php


namespace App\Controllers;


use App\Core\Controller;

/**
 * Class ErrorController
 * @package App\Controllers
 */
class ErrorController extends Controller
{
    /**
     * @return string
     * @throws \Exception
     */
    public function actionError()
    {
        return $this->render();
    }

    /**
     * Init view and layout for this controller
     */
    protected function init()
    {
        $this->layout = 'error';
        $this->view = 'errors/error_page';
    }
}