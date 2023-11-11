<?php

class HistoryController
{
    public function index()
    {
        require("./view/history.php");
    }

    public function getGlobalGameHistory($params)
    {
        echo json_encode(GlobalGameHistory::getGlobalGameHistoryByUserId($params['userId']));
    }
}
