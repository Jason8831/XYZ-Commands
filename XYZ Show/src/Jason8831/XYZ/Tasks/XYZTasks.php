<?php

namespace Jason8831\XYZ\Tasks;

use Jason8831\XYZ\Main;
use pocketmine\player\Player;
use pocketmine\scheduler\Task;
use Jason8831\XYZ\Commands\xyz;
use pocketmine\Server;
use pocketmine\utils\Config;

class XYZTasks extends Task
{

    public function onRun(): void
    {
        $config = new Config(Main::getInstance()->getDataFolder() . "config.yml", Config::YAML);
        if(empty(XYZ::$xyz))return;
        foreach (XYZ::$xyz as $player){
            $player = Server::getInstance()->getPlayerExact($player);
            if(is_null($player))continue;
            if($player instanceof Player){
                if($player->isOnline()){
                    $pos = $player->getPosition();
                    $x = str_replace("{x}", $pos->getX(), $config->get("popup"));
                    $y = str_replace("{y}", $pos->getY(), $x);
                    $z = str_replace("{z}", $pos->getZ(), $y);
                    $player->sendPopup($z);
                }
            }
    }
    }

}