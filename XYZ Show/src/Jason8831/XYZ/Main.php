<?php
namespace Jason8831\XYZ;

use Jason8831\XYZ\Events\PlayerQuitEvents;
use Jason8831\XYZ\Tasks\XYZTasks;
use pocketmine\event\Listener;
use pocketmine\plugin\PluginBase;
use pocketmine\utils\Config;

class Main extends PluginBase implements Listener
{

    public Config $config;

    /**
     * @var Main
     */
    private static $instance;


    public function onEnable(): void
    {
        self::$instance = $this;
        $this->getLogger()->info("§f[§l§4XYZ§r§f]: activée");
        $this->saveResource("config.yml");

        $this->getServer()->getPluginManager()->registerEvents(new PlayerQuitEvents(), $this);

        $this->getServer()->getCommandMap()->registerAll("AllCommands", [
            new Commands\xyz(name: "xyz", description: "permet d'activer les coordonées", usageMessage: "xyz", aliases: ["coord", "coords"])
        ]);

        $this->getScheduler()->scheduleRepeatingTask(new XYZTasks(), 3);
    }

    public static function getInstance(): self{
        return self::$instance;
    }
}