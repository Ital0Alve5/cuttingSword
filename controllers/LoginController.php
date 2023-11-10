<?php

class LoginController{
    public function index(){
//1. Chamar função do models que checa se email existe
        $user = new Users();
        if(!$user->checkEmail(["email"])){
            echo json_encode(["error"=> true, "message"=> 'Usuário não cadastrado'], JSON_UNESCAPED_UNICODE);
        }

//2. Se o email existir, verificar se o email corresponde a senha
        if(!$user->checkEmailPassRelation(['email'], ['password'])){
            echo json_encode(["error"=> true, "message"=> 'Usuário ou senhas incorretos'], JSON_UNESCAPED_UNICODE);
        }

//3. Devolver os dados
        echo json_encode(["error"=> false, "message"=> 'Login concluído com sucesso', "id"=> ['id'], "name"=> 'name'], JSON_UNESCAPED_UNICODE);
    }
}