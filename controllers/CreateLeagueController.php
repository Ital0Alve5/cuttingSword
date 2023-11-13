<?php

class CreateLeagueController extends Controller{
    public function index()
    {
        $this->protectedView('createLeague');
    }

    public function createLeague($data){
        $league = new Leagues();
        if (!$league->leagueExists($data['leagueName'])) {
            echo json_encode(["error" => true, "message" => "Nome de liga já está em uso"], JSON_UNESCAPED_UNICODE);
        } else if (strlen($data['leagueName']) > 20) {
            echo json_encode(["error" => true, "message" => "Nome de liga deve ter no máximo 20 caracteres"], JSON_UNESCAPED_UNICODE);
        } else if (strlen($data['leagueName']) < 6) {
            echo json_encode(['error'=> true, 'message'=> 'Nome da liga deve ter mais de 6 caracteres'], JSON_UNESCAPED_UNICODE);
        } else if (!Sanitize::sanitizePassword($data['leaguePassword'])) {
            echo json_encode(['error'=> true, 'message'=> 'Caracteres inválidos na senha'], JSON_UNESCAPED_UNICODE);
        } else if (!Sanitize::sanitizeName($data['leagueName'])) {
            echo json_encode(['error'=> true, 'message'=> 'Senha inválida'], JSON_UNESCAPED_UNICODE);            
        } else {
            $leagueId = Leagues::createLeague($_SESSION['userId'], $data['leagueName'], $data['leaguePassword']);
            echo json_encode(['error'=> false, 'message'=> 'Liga criada com sucesso', 'leagueId'=> $leagueId, 'leagueName'=> $data['leagueName']], JSON_UNESCAPED_UNICODE); 
        }
    }
}
