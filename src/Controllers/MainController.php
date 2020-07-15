<?php


namespace App\Controllers;


use App\Core\Controller;
use App\Models\CityModel;

class MainController extends Controller
{
    public function actionIndex()
    {
        $cities = CityModel::selectAllArray();
        return $this->render(['cities' => $cities]);
    }

    protected function init()
    {
        $this->layout = 'default';
        $this->view = 'main/index';
    }
}