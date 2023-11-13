<?php

namespace controllers\api;

use controllers\Controller;
use models\Session;
use models\GlobalGameHistory;

class HistoryController extends Controller
{
    public function getGlobalGameHistory()
    {
        if (!Session::sessionProtection()) {
            echo json_encode(["error" => true, "message" => "Permissões insuficientes"], JSON_UNESCAPED_UNICODE);
            return;
        }

        echo json_encode(GlobalGameHistory::getGlobalGameHistoryByUserId($_SESSION['userId']), JSON_UNESCAPED_UNICODE);
    }
}
