<?php

namespace Source\App\Api;

use Source\Models\User;
use Source\Core\TokenJWT;

class Users extends Api
{
    public function __construct()
    {
        parent::__construct();
    }

    public function read (array $data) : void
    {
        $response = [
            "code" => 200,
            "type" => "success",
            "message" => "Dados do usuário"
        ];
        http_response_code(200);
        echo json_encode($response, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
    }

    public function create (array $data) : void
    {
        //echo json_encode($data);

        if(!empty($data)){
            $user = new User($data["name"],$data["email"],$data["password"]);
            $user->insert();
            http_response_code(200);
            $response["user"] = [
                "name" => $user->getName(),
                "email" => $user->getEmail()
            ];
            echo json_encode($response, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
            return;
        }

        $response = [
            "code" => 200,
            "type" => "success",
            "message" => "Usuário criado com sucesso"
        ];
        http_response_code(200);
        echo json_encode($response, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);

    }

    public function login (array $data) : void
    {

        $user = new User();
        if(!$user->auth($data["email"],$data["password"])){
            $response = [
                "code" => 401,
                "type" => "error",
                "message" => "Email ou senha inválidos"
            ];
            echo json_encode($response, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
            return;
        }

        $response = [
            "code" => 200,
            "type" => "success",
            "message" => "Usuário logado com sucesso"
        ];
        echo json_encode($response, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);

    }

    public function testToken (array $data) : void
    {
        if(!empty($data)) {
            echo "Email: {$data["email"]} - Password: {$data["password"]} <br>";
            $user = new User();
            if(!$user->auth($data["email"],$data["password"])){
                echo "Email ou senha inválidos";
                return;
            }

            $token = (new TokenJWT())->create([
                "email" => $user->getEmail()
            ]);

            echo "Esse é o toke -> {$token}";

        }

    }
}
