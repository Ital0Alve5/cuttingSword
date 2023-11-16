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
            echo json_encode(["error" => true, "message" => "Nome de liga já está em uso", "element" => "leagueName"], JSON_UNESCAPED_UNICODE);
        } else if (strlen($data['leagueName']) > 20) {
            echo json_encode(["error" => true, "message" => "Nome de liga deve ter no máximo 20 caracteres", "element" => "leagueName"], JSON_UNESCAPED_UNICODE);
        } else if (strlen($data['leagueName']) < 6) {
            echo json_encode(['error' => true, "message" => "Nome da liga deve ter mais de 6 caracteres", "element" => "leagueName"], JSON_UNESCAPED_UNICODE);
        } else if (!Sanitize::sanitizeName($data["leagueName"])) {
            echo json_encode(["error" => true, "message" => "Apenas letras são aceitas no nome da liga", "element" => "leagueName"], JSON_UNESCAPED_UNICODE);
        } else if (strlen($data["secretKey"]) > 20) {
            echo json_encode(["error" => true, "message" => "Palavra-Chave deve ter no máximo 20 caracteres", "element" => "leaguePassword"], JSON_UNESCAPED_UNICODE);
        } else if (strlen($data["secretKey"]) < 6) {
            echo json_encode(["error" => true, "message" => "Palavra-Chave deve ter mais de 6 caracteres", "element" => "leaguePassword"], JSON_UNESCAPED_UNICODE);
        } else {
            $leagueId = Leagues::createLeague($_SESSION['userId'], $data['leagueName'], md5($data['secretKey']));
            Users::linkUserToLeague($_SESSION['userId'], $leagueId);
            Session::createSession($_SESSION['userId'], $_SESSION['email'], $leagueId);
            echo json_encode(['error' => false, 'message' => 'Liga criada com sucesso', 'leagueId' => $leagueId, 'leagueName' => $data['leagueName']], JSON_UNESCAPED_UNICODE);
        }
    }

    public function loginLeague($data)
    {

        if (!Session::sessionProtection()) {
            echo json_encode(["error" => true, "message" => "Permissões insuficientes"], JSON_UNESCAPED_UNICODE);
            return;
        }


        $league = new Leagues();
        $league->loadLeagueByName($data['leagueName']);

        if (Users::isUserPartOfLeague($_SESSION['userId'],  $league->getId())) {
            echo json_encode(["error" => true, "message" => "Usuário já faz parte desta liga."], JSON_UNESCAPED_UNICODE);
            return;
        }


        $user = new Users();
        $user->loadUserById($_SESSION['userId']);

        if (Leagues::leagueExists($data['leagueName']) && $league->getSecretKey() === md5($data['secretKey'])) {
            Users::linkUserToLeague($_SESSION['userId'], $league->getId());
            Session::createSession($_SESSION['userId'], $_SESSION['email'], $league->getId());
            echo json_encode(["error" => false, "message" => "Inserido na liga com sucesso"], JSON_UNESCAPED_UNICODE);
        } else {
            echo json_encode(["error" => true, "message" => "Nome ou senha da liga incorretos"], JSON_UNESCAPED_UNICODE);
        }
    }

    public function joinLeague($data)
    {

        if (!Session::sessionProtection()) {
            echo json_encode(["error" => true, "message" => "Permissões insuficientes"], JSON_UNESCAPED_UNICODE);
            return;
        }

        $league = new Leagues();
        $league->loadLeagueByName($data['leagueName']);

        if (Users::isUserPartOfLeague($_SESSION['userId'], $league->getId())) {
            $_SESSION['leagueId'] = $league->getId();
            echo json_encode(["error" => false, "message" => "Entrou na liga com sucesso"], JSON_UNESCAPED_UNICODE);
        } else {
            echo json_encode(["error" => true, "message" => "Usuário não faz parte da liga"], JSON_UNESCAPED_UNICODE);
        }
    }

    public function exitLeague()
    {
        if (!Session::sessionProtection()) {
            echo json_encode(["error" => true, "message" => "Permissões insuficientes"], JSON_UNESCAPED_UNICODE);
            return;
        }

        $_SESSION['leagueId'] = 0;
    }

    public function infoLeague()
    {

        if (!Session::sessionProtection()) {
            echo json_encode(["error" => true, "message" => "Permissões insuficientes"], JSON_UNESCAPED_UNICODE);
            return;
        }

        $league = new Leagues();
        $league->loadLeagueById($_SESSION['leagueId']);

        echo json_encode(["leagueId" => $league->getId(), "leagueName" => $league->getName()], JSON_UNESCAPED_UNICODE);
    }
}
