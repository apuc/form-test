<?php


namespace App\Controllers;


use App\Core\Controller;
use App\Models\CityModel;
use App\Models\RequestModel;

/**
 * Class ShowController
 * @package App\Controllers
 */
class ShowController extends Controller
{
    /**
     * @return string
     * @throws \Exception
     */
    public function actionShowCity()
    {
        $cities = CityModel::selectAllArray();

        return $this->render(['cities' => $cities]);
    }

    /**
     * @return string
     * @throws \Exception
     */
    public function actionShowAllRequest()
    {
        $this->view = 'show/show_requests';
        $requests = RequestModel::selectAllRequest();

        return $this->render(['requests' => $requests]);
    }

    /**
     * Init view and layout for this controller
     */
    protected function init()
    {
        $this->layout = 'default';
        $this->view = 'show/show_cities';
    }
}
