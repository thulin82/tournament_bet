<?php
class Controller
{

    /**
     * Model
     *
     * @param string $model Model
     *
     * @return mixed Model
     */
    public function model($model)
    {
        include_once '../src/models/' . $model . '.php';
        return new $model();
    }

    /**
     * View
     *
     * @param string $view View
     * @param array  $data Data
     *
     * @return void
     */
    public function view($view, $data = [])
    {
        if (file_exists('../src/views/' . $view . '.php')) {
            include_once '../src/views/' . $view . '.php';
        } else {
            die('View does not exist');
        }
    }
}
