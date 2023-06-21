<?php

namespace Source\App;

use League\Plates\Engine;
use Source\Models\Category;
use Source\Models\Faq;
use Source\Models\User;
use Source\Models\Course;

class Web
{

    private $view;
    private $categories;

    public function __construct()
    {
        $this->view = new Engine(__DIR__ . "/../../themes/web","php");
        $categories = new Category();
        $this->categories = $categories->selectAll();
        //var_dump($this->categories);
    }

    public function home()
    {
        echo $this->view->render("home",[
            "categories" => $this->categories
        ]);
    }

    public function register(array $data)
    {
        if(!empty($data)){
            $response = json_encode($data);
            echo $response;
            return;
        }

        echo $this->view->render("register-clean",[
            "categories" => $this->categories
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
                "courses" => $courses->selectByCategory($data["category"]),
                "categories" => $this->categories
            ]);
            return;
        }

        //var_dump($courses->selectAll());
        echo $this->view->render("courses",[
            "courses" => $courses->selectAll(),
            "categories" => $this->categories
        ]);
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
