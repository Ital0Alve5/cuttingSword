<?php

namespace controllers\api;

use controllers\Controller;

use models\Session;
use models\Sanitize;
use models\Leagues;
use models\Users;

class LeagueController extends Controller
{
    public function getLeagueNameByLeagueId($params)
    {
        if (!Session::sessionProtection()) {
            echo json_encode(["error" => true, "message" => "Permissões insuficientes"], JSON_UNESCAPED_UNICODE);
            return;
        }

        $league = new Leagues();
        $league->loadLeagueById($params['leagueId']);

        echo json_encode(["leagueName" => $league->getName()], JSON_UNESCAPED_UNICODE);
    }

    public function getUserLeagues()
    {
        if (!Session::sessionProtection()) {
            echo json_encode(["error" => true, "message" => "Permissões insuficientes"], JSON_UNESCAPED_UNICODE);
            return;
        }

        $user = new Users();
        $user->loadUserLeaguesById($_SESSION['userId']);
        echo json_encode($user->getLeaguesList(), JSON_UNESCAPED_UNICODE);
    }

    public function createLeague($data)
    {
        if (!Session::sessionProtection()) {
            echo json_encode(["error" => true, "message" => "Permissões insuficientes"], JSON_UNESCAPED_UNICODE);
            return;
        }

        $league = new Leagues();
        if ($league->leagueExists($data['leagueName'])) {
            echo json_encode(["error" => true, "message" => "Nome de liga já está em uso"], JSON_UNESCAPED_UNICODE);
        } else if (strlen($data['leagueName']) > 20) {
            echo json_encode(["error" => true, "message" => "Nome de liga deve ter no máximo 20 caracteres"], JSON_UNESCAPED_UNICODE);
        } else if (strlen($data['leagueName']) < 6) {
            echo json_encode(['error' => true, 'message' => 'Nome da liga deve ter mais de 6 caracteres'], JSON_UNESCAPED_UNICODE);
        } else if (!Sanitize::sanitizeName($data['leagueName'])) {
            echo json_encode(['error' => true, 'message' => 'Apenas letras são aceitas no nome da liga'], JSON_UNESCAPED_UNICODE);
        } else if (strlen($data['leaguePassword']) > 20) {
            echo json_encode(["error" => true, "message" => "Senha deve ter no máximo 20 caracteres"], JSON_UNESCAPED_UNICODE);
        } else if (strlen($data['leaguePassword']) < 6) {
            echo json_encode(['error' => true, 'message' => 'Senha deve ter mais de 6 caracteres'], JSON_UNESCAPED_UNICODE);
        } else {
            $leagueId = Leagues::createLeague($_SESSION['userId'], $data['leagueName'], md5($data['leaguePassword']));
            Users::linkUserToLeague($_SESSION['userId'], $leagueId);
            Session::createSession($_SESSION['userId'], $_SESSION['email'], $leagueId);
            echo json_encode(['error' => false, 'message' => 'Liga criada com sucesso', 'leagueId' => $leagueId, 'leagueName' => $data['leagueName']], JSON_UNESCAPED_UNICODE);
        }
    }
}
