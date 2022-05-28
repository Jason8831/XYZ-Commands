<?php

namespace Jason8831\XYZ\Events;

use pocketmine\event\Listener;
use pocketmine\event\player\PlayerQuitEvent;

class PlayerQuitEvents implements Listener
{
    public static array $xyz = [];
    public function OnQuit(PlayerQuitEvent $event)
    {
        $player = $event->getPlayer();

        unset(self::$xyz[$player->getName()]);
    }
}