<?php

namespace UI;

use pocketmine\Server;
use pocketmine\Player;
use pocketmine\plugin\PluginBase;
use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use pocketmine\command\ConsoleCommandSender;
use pocketmine\ulits\TextFormat;
use pocketmine\item\Item;
use pocketmine\event\Listener;

class main extends PluginBase implements Listener {
    public function onEnable() {
        @mkdir($this->getDataFolder());
        $this->saveDefaultConfig();
        $this->getResource("Config.yml");
        $this->getLogger()->info("Enable...");
        $this->getServer()->getPluginManager()->registerEvents($this, $this);
    }
    public function GiftUI($player){

        $code = $this->getConfig()->get("code");
        $cfg = $this->getConfig();

        $api = $this->getServer()->getPluginManager()->getPlugin("FormAPI");
        $form = $api->createCustomForm(function (Player $player, array $data = null) {
            $result = $data;
            if ($result === null) {
                return true;
            }
            if($data[0] == $code){
                if($player->hasPermission("gift1.huh")){
                    $player->sendMessage("You always use this code");
                    } else {
                        $player->sendMessage("true code!");
                        $this->getServer()->dispatchCommand(new ConsoleCommandSender(),"setuperm {$player->getName()} gift1.huh");
                        $player->getInventory()->addItem($cfg->get("item-id"), 0, 1);
                        $player->sendtitle($cfg->get("title"));
                    }
            }
            public function cmd(CommandSender $p, Command $cmd, string $label, array $args):bool{
            if($cmd->getName()){
                case 'gift':
            if($sender instanceof Player){
            $this->GiftUI($p)
            }
                break;
            }
                
                return ture;
            }
}
