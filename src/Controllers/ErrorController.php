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
        $error_code = http_response_code();
        return $this->render(['error_code' => $error_code]);
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