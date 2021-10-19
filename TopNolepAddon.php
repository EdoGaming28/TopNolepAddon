<?php
declare(strict_types = 1);

/**
 * @name TopNolepAddon
 * @version 1.0.0
 * @main JackMD\ScoreHud\Addons\TopNolepAddon
 * @depend TopNolep
 */
namespace JackMD\ScoreHud\Addons {

    use JackMD\ScoreHud\addon\AddonBase;
    use pocketmine\Player;
    use Zedstar16\OnlineTime\Main;

    class TopNolepAddon extends AddonBase{

        /** @var TopNolep */
        private $topnolep;

        public function onEnable() : void{
            $this->topnolep = $this->getServer()->getPluginManager()->getPlugin("TopNolep");
        }

        /**
         * @param Player $player
         * @return array
         */
        public function getProcessedTags(Player $player): array{
            return [
                "{nolep_time}"   => $this->getTotal($player->getName())
                ];
        }

        public function getTotal($pn){
            $pn = strtolower($pn);
            return isset(Main::$times[$pn]) ? $this->onlinetime->getNolepTime($pn) : "null";
        }
    }
}
