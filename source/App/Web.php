<?php

namespace Source\App;

use League\Plates\Engine;

class Web
{

    public function home()
    {
        $view = new Engine(__DIR__ . "/../../themes/web","php");
        $view->render("home",[]);
        echo "Olá, Mundo! Home";
    }

    public function about()
    {
        echo "Olá, Mundo! Sobre";
    }

    public function location()
    {
        echo "Essa é a minha localização!";
    }

    public function blog (){
        echo "esse é o meu blog bonitinho...";
    }

}
