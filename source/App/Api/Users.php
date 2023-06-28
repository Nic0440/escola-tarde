<?php

namespace Source\App\Api;

use Source\Models\User;

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
        $response = [
            "code" => 200,
            "type" => "success",
            "message" => "Usuário logado com sucesso"
        ];
        http_response_code(200);
        echo json_encode($response, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
    }
}
