<?php

declare(strict_types=1);

namespace scher\trollxd\troll;

use pocketmine\event\entity\EntityDamageEvent;
use pocketmine\event\inventory\InventoryOpenEvent;
use pocketmine\event\Listener;
use pocketmine\player\Player;
use pocketmine\utils\TextFormat;

class Damage extends Troll {

	public function __construct(
		private readonly int $damage) {}

	public function action(Player $trolled): void {
		if ($trolled->isOnline()) {
			$trolled->attack(new EntityDamageEvent($trolled, EntityDamageEvent::CAUSE_SUICIDE, $this->getDamage()));
		}
	}

	public function getDamage(): int {
		return $this->damage ?? 1;
	}

	public function getName(): string {
		return "damage";
	}
}
