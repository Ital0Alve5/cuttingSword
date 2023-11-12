<?php

class LeagueController extends Controller
{

    public function index()
    {
        $this->protectedView('leagues');
    }

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
}
