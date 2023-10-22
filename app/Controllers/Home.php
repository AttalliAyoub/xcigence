<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index(): string
    {
        $str = file_get_contents("./assets/data.json");
        $json = json_decode($str, true);
        return view('Home/index', $json);
    }
}
