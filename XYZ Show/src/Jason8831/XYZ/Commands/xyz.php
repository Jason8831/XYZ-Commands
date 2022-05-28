<?php

namespace Jason8831\XYZ\Commands;

use Jason8831\XYZ\Main;
use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use pocketmine\lang\Translatable;
use pocketmine\player\Player;
use pocketmine\utils\Config;

class xyz extends Command
{

    public static array $xyz = [];

    public function __construct(string $name, Translatable|string $description = "", Translatable|string|null $usageMessage = null, array $aliases = [])
    {
        parent::__construct($name, $description, $usageMessage, $aliases);
    }
    public function execute(CommandSender $sender, string $commandLabel, array $args)
    {
        $config = new Config(Main::getInstance()->getDataFolder() . "config.yml", Config::YAML);

        if($sender instanceof Player){
            if(!isset(self::$xyz[$sender->getName()])) {
                self::$xyz[$sender->getName()] = $sender->getName();
                $sender->sendMessage($config->get("activer"));
            }else{
                unset(self::$xyz[$sender->getName()]);
                $sender->sendMessage($config->get("desactiver"));
            }
        }
    }

}