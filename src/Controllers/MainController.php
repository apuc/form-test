<?php


namespace App\Controllers;


use App\Core\Controller;
use App\Models\CityModel;

/**
 * Class MainController
 * @package App\Controllers
 */
class MainController extends Controller
{
    /**
     * @return string
     * @throws \Exception
     */
    public function actionIndex()
    {
        $cities = CityModel::selectAllArray();
        return $this->render(['cities' => $cities]);
    }

    /**
     * Init view and layout for this controller
     */
    protected function init()
    {
        $this->layout = 'default';
        $this->view = 'main/index';
    }
}