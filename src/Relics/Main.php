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
use pocketmine\nbt\tag\StringTag;
use pocketmine\event\player\PlayerInteractEvent;
use pocketmine\item\enchantment\Enchantment;


class Main extends PluginBase implements Listener {
  
  public function onEnable() {
  $this->getServer()->getPluginManager()->registerEvents($this,$this);
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
      $chance = mt_rand(5, 3500);
      
      //Check Rarity
      if($chance >= 35 && $chance <= 50){
        $player->sendMessage("You've found a Common Artifacts!");
        $reward = Item::get(399, 0, 1);
        $reward->setCustomName("Common Artifact");
        $reward->setNamedTagEntry(new StringTag("Artifact", "common"));
        $player->getInventory()->addItem($reward);
        
      
      }
      
      if($chance >= 25 && $chance <= 30){
        $player->sendMessage("You've a Uncommon Artifacts!");
        $reward = Item::get(399, 0, 1);
        $reward->setCustomName("§bUncommon Artifact");
        $reward->setNamedTagEntry(new StringTag("Artifact", "uncommon"));
        $player->getInventory()->addItem($reward);
      }
      
      if($chance >= 15 && $chance <= 20){
        $player->sendMessage("You've a Rare Artifacts!");
        $reward = Item::get(399, 0, 1);
        $reward->setCustomName("§cRare Artifact");
        $reward->setNamedTagEntry(new StringTag("Artifact", "rare"));
        $player->getInventory()->addItem($reward);
      }
      
      if($chance >= 5 && $chance <= 10){
        $player->sendMessage("Yous a Mythic Artifacts!");
        $reward = Item::get(399, 0, 1);
        $reward->setCustomName("§dMythic Artifact");
        $reward->setNamedTagEntry(new StringTag("Artifact", "mythic"));
        $player->getInventory()->addItem($reward);
      }
      
    }
  }
  
  public function onClick(PlayerInteractEvent $event){
    $player = $event->getPlayer();
    $item = $event->getItem();
    $name = $player->getName();
    
    if($item->getNamedTag()->hasTag("Artifact")){
      
      $rewardString = $item->getNamedTag()->getString("Artifact");
      
      if($rewardString === "common"){
        $command = "give ".$name." 384 18";
        $randMoney = mt_rand(20000, 30000);
        $command2 = "givemoney ".$name." ".$randMoney."";
        $command3 = "kitgive Peasent ".$name."";
        $command4 = "key Common 2 ".$name."";
        $prize = mt_rand(0, 3);
        
        $player->getInventory()->removeItem(Item::get(399, 0, 1));
        
        switch ($prize) {
          case 0:
            $this->getServer()->dispatchCommand(new ConsoleCommandSender, $command);
            break;
          
          case 1:
            $this->getServer()->dispatchCommand(new ConsoleCommandSender, $command2);
            break;
          
          case 2:
            $this->getServer()->dispatchCommand(new ConsoleCommandSender, $command3);
            break;
          
          case 3:
            $this->getServer()->dispatchCommand(new ConsoleCommandSender, $command4);
            break;
        }
        
      }
      
      if($rewardString === "uncommon"){
        $command = "give ".$name." 384 28";
        $randMoney = mt_rand(30000, 40000);
        $command2 = "givemoney ".$name." ".$randMoney."";
        $command3 = "kitgive Legend ".$name."";
        $command4 = "key Vote 2 ".$name."";
        $prize = mt_rand(0, 3);
        
        $player->getInventory()->removeItem(Item::get(399, 0, 1));
        
        switch ($prize) {
          case 0:
            $this->getServer()->dispatchCommand(new ConsoleCommandSender, $command);
            break;
          
          case 1:
            $this->getServer()->dispatchCommand(new ConsoleCommandSender, $command2);
            break;
          
          case 2:
            $this->getServer()->dispatchCommand(new ConsoleCommandSender, $command3);
            break;
          
          case 3:
            $this->getServer()->dispatchCommand(new ConsoleCommandSender, $command4);
            break;
        }
        
      }
      
      if($rewardString === "rare"){
        $command = "give ".$name." 384 38";
        $randMoney = mt_rand(40000, 50000);
        $command2 = "givemoney ".$name." ".$randMoney."";
        $command3 = "kitgive God ".$name."";
        $command4 = "key Mythic 1 ".$name."";
        $prize = mt_rand(0, 3);
        
        $player->getInventory()->removeItem(Item::get(399, 0, 1));
        
        switch ($prize) {
          case 0:
            $this->getServer()->dispatchCommand(new ConsoleCommandSender, $command);
            break;
          
          case 1:
            $this->getServer()->dispatchCommand(new ConsoleCommandSender, $command2);
            break;
          
          case 2:
            $this->getServer()->dispatchCommand(new ConsoleCommandSender, $command3);
            break;
          
          case 3:
            $this->getServer()->dispatchCommand(new ConsoleCommandSender, $command4);
            break;
        }
        
      }
      
      if($rewardString === "mythic"){
        $command = "give ".$name." 384 48";
        $randMoney = mt_rand(50000, 60000);
        $command2 = "givemoney ".$name." ".$randMoney."";
        $command3 = "kitgive Zeus ".$name."";
        $command4 = "key Legendary 2 ".$name."";
        $command5 = "key Kits 1 ".$name."";
        $prize = mt_rand(0, 4);
        
        $player->getInventory()->removeItem(Item::get(399, 0, 1));
        
        switch ($prize) {
          case 0:
            $this->getServer()->dispatchCommand(new ConsoleCommandSender, $command);
            break;
          
          case 1:
            $this->getServer()->dispatchCommand(new ConsoleCommandSender, $command2);
            break;
          
          case 2:
            $this->getServer()->dispatchCommand(new ConsoleCommandSender, $command3);
            break;
          
          case 3:
            $this->getServer()->dispatchCommand(new ConsoleCommandSender, $command4);
            break;
          
          case 4:
            $this->getServer()->dispatchCommand(new ConsoleCommandSender, $command5);
            break;
        }
        
      }
      
    }
    
  }
  
}
