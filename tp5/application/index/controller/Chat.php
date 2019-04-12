<?php

namespace app\index\controller;

use app\common\lib\Util;

class Chat
{
    public function index()
    {
        //进行数据的判断
        if (empty($_POST['content']) || empty($_POST['game_id'])) {
            return Util::show(config("code.error"), 'param error');
        }

        $text = $_POST['content'];
        $game_id = $_POST['game_id'];
        $data = [
            'user' => "mc-" . $game_id .rand(0,444),
            'content' => $text
        ];

        foreach ($_POST['http_server']->ports[1]->connections as $fd) {

            $_POST['http_server']->push($fd, json_encode($data));
        }



    }


}