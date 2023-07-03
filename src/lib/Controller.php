<?php
class Controller
{

    public function model($model)
    {
        include_once '../src/models/' . $model . '.php';
        return new $model();
    }

    public function view($view, $data = [])
    {
        if (file_exists('../src/views/' . $view . '.php')) {
            include_once '../src/views/' . $view . '.php';
        } else {
            die('View does not exist');
        }
    }
}
