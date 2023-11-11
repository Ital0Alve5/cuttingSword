<?php

class SignupController{
    public function index($data)
    {
        $user = new Users();
        if ($user->emailExists($data['email'])) {
            echo json_encode(["error" => true, "message" => "Email já está em uso"], JSON_UNESCAPED_UNICODE);
        }else if($user->nameExists($data['name'])){
            echo json_encode(["error" => true, "message" => "Nome de usuário já está em uso"], JSON_UNESCAPED_UNICODE);
        }else if(strlen($data["password"]) < 6){
            echo json_encode(["error" => true, "message" => "Senha deve ter pelo menos 6 caracteres"], JSON_UNESCAPED_UNICODE);
        }else if(strlen($data["password"]) > 20){
            echo json_encode(["error" => true, "message" => "Senha deve ter no máximo 20 caracteres"], JSON_UNESCAPED_UNICODE);
        }else{
            $userId = $user->createUser($data["name"], $data["email"], $data["password"]);
            echo json_encode(["error"=> false, "message"=> "Cadastro concluído com sucesso", "id"=> $userId, "name"=>$data['name']], JSON_UNESCAPED_UNICODE);
        }
    }
}