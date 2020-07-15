<?php

namespace App\Core;

use App\Exceptions\ViewException;
use eftec\bladeone\BladeOne;
use Exception;

/**
 * Class Controller
 * @package App\Core
 */
abstract class Controller
{
    protected $view = 'main/index';
    protected $layout = 'default';
    protected $blade;

    /**
     * Controller constructor.
     * @param null $blade
     */
    public function __construct($blade = null)
    {
        $this->blade = new BladeOne(ROOT_DIR . 'views', ROOT_DIR . 'compiles', BladeOne::MODE_DEBUG);
        $this->init();
    }

    protected function init()
    {
        $this->view = 'main/index';
        $this->layout = 'default';
    }

    /**
     * @param array|null $arr
     * @return string
     * @throws Exception
     */
    public function render(array $arr = null)
    {
        try {
            if (is_null($this->layout) OR is_null($this->view)) {
                throw new ViewException("Layout or views are empty...");
            }
            $view_path = ROOT_DIR . '/views/' . $this->view . '.blade.php';
            $layout_path = ROOT_DIR . '/views/layouts/' . $this->layout . '.blade.php';
            if (file_exists($view_path) AND file_exists($layout_path)) {
                // call template engine Blade
                return $this->blade->run($this->view . '.blade.php', $arr);
            } else {
                throw new ViewException("Layout or views are not exist...");
            }
        } catch (ViewException $ex) {
            header('Location: /error');
        }
    }

    /**
     * @return string
     */
    public function getLayout(): string
    {
        return $this->layout;
    }

    /**
     * @return string
     */
    public function getView(): string
    {
        return $this->view;
    }
}