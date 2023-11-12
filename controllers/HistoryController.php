<?php

class HistoryController
{
    public function index()
    {
        //Usuário obrigado a estar logado
        SessionController::SessionProtection();

        require("./view/history.php");
    }

    public function getGlobalGameHistory($params)
    {
        //Usuário obrigado a estar logado
        SessionController::SessionProtection();     

        //Sanitização de url com leagueID malicioso
        if(!SanitizeController::sanitizeNumber($params)){
            echo json_encode(["error" => $true, "message" => "ID de usuário inválido"]);
        }
        echo json_encode(GlobalGameHistory::getGlobalGameHistoryByUserId($params['userId']));
    }
}
