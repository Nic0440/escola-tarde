<?php

namespace Source\App;

use League\Plates\Engine;


class App
{

    public function __construct()
    {
        $this->view = new Engine(__DIR__ . "/../../themes/app","php");
        //var_dump($this->categories);
    }

    public function home()
    {
        echo "Olá, Mundo!";;
    }

}
