<?php

class HistoryController
{
    public function index()
    {
        require("./view/historic.php");
    }

    public function getGameHistoryById(){
        echo json_encode(GameHistory::getGameHistoryByUserId(1));
    }
}
