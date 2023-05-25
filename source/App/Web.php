<?php

namespace Source\App;

use League\Plates\Engine;
use Source\Models\Faq;
use Source\Models\User;
use Source\Models\Course;

class Web
{

    private $view;

    public function __construct()
    {
        $this->view = new Engine(__DIR__ . "/../../themes/web","php");
    }

    public function home()
    {
        echo $this->view->render("home",[]);
    }

    public function register()
    {
        $user = new User("Fernando","fernando@gmail.com","987654");
        var_dump($user);
        //$user->insert();
        //$users = $user->selectAll();
        //var_dump($users);

        echo $this->view->render("register",[
            "users" => $user->selectAll()
        ]);
    }

    public function about()
    {
        echo $this->view->render("about",[]);
    }

    public function location()
    {
        $name = "Fábio Santos";
        echo $this->view->render("location",[
            "name" => "Fábio",
            "email" => "fabiosantos@ifsul.edu.br"
        ]);
    }

    public function blog ()
    {
        echo "esse é o meu blog bonitinho...";
    }

    public function courses(array $data) : void
    {
        $courses = new Course();

        if(!empty($data["category"])){
            //var_dump($data["category"]);
            echo $this->view->render("courses",[
                "courses" => $courses->selectByCategory($data["category"])]
            );
            return;
        }

        //var_dump($courses->selectAll());
        echo $this->view->render("courses",["courses" => $courses->selectAll()]);
    }

    public function faq ()
    {
        $faqs = new Faq();
        //var_dump($faqs->selectAll());
        echo $this->view->render("faq",[
            "faqs" => $faqs->selectAll()
        ]);

    }

    public function chart ()
    {
        echo "Carrinho de compras";
    }

    public function services ()
    {
        echo $this->view->render("services",[]);
    }

    public function contact ()
    {
        echo $this->view->render("contact",[]);
    }

    public function error (array $data) : void
    {
        var_dump($data);
    }



}
