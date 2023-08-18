<?php

namespace Source\App\Api;

use Source\Core\TokenJWT;

class Api
{
    /** @var \Source\Models\User|null */
    protected $user;
    protected $headers;

    public function __construct()
    {
        header('Content-Type: application/json; charset=UTF-8');
        $this->headers = getallheaders();

        var_dump($this->headers["token"]);

        $token = new TokenJWT();

        if(!$token->verify($this->headers["token"])){
            echo "Token inválido";
            return;
        }

        echo "Token Válido, seja bem-vindo";
    }

}
