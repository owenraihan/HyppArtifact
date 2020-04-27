<?php

namespace Relics;

use pocketmine\plugin\PluginBase;
use pocketmine\Server;
use pocketmine\Player;
use pocketmine\event\Listener;
use pocketmine\event\block\BlockBreakEvent;
use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use pocketmine\command\ConsoleCommandSender;
use pocketmine\item\Item;
use pocketmine\nbt\StringTag;
use pocketmine\event\player\PlayerInteractEvent;

class Main extends PluginBase implements Listener {
  
  public function onEnable() {
    $this->getLogger()->info("Relics Enabled");
  }
  
  public function onDisable() {
    $this->getLogger()->info("Plugin Disabled!");
  }
  
  public function onLoad() {
    $this->getLogger()->info("Plugin Loaded!");
  }
  
  //Player Mining
  public function onBreak(BlockBreakEvent $ev) {
    $player = $ev->getPlayer();
    $block = $ev->getBlock();
    $item = $ev->getItem();
    $name = $player->getName();
    
    //Check ID
    if($block->getId() == 1){
      $chance = mt_rand(0, 1000);
      
      //Check Rarity
      if($chance >= 110){
        $player->sendMessage("You've found a Common Artifacts!");
        $reward = Item::get(399, 0, 1);
        $reward->setCustomName("Common Relic");
        $reward->setNamedTagEntry(new StringTag("Common", "Relic"));
        $player->getInventory()->addItem($item);
      }
    }
  }
  
}