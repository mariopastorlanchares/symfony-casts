<?php

namespace App\ActionCommand;

use App\Character\Character;
use App\FightResultSet;
use App\GameApplication;

class AttackCommand implements ActionCommandInterface
{


    private int $damageDealt;
    private int $stamina;

    public function __construct(
        private readonly Character      $player,
        private readonly Character      $opponent,
        private readonly FightResultSet $fightResultSet
    )
    {
    }

    public function execute()
    {
        $this->stamina = $this->player->getStamina();

        $playerDamage = $this->player->attack();
        if ($playerDamage === 0) {
            GameApplication::$printer->printFor($this->player)->exhaustedMessage();
            $this->fightResultSet->of($this->player)->addExhaustedTurn();
        }

        $damageDealt = $this->opponent->receiveAttack($playerDamage);
        $this->damageDealt = $damageDealt;
        $this->fightResultSet->of($this->player)->addDamageDealt($damageDealt);

        GameApplication::$printer->printFor($this->player)->attackMessage($damageDealt);
        GameApplication::$printer->writeln('');
        usleep(300000);
    }

    public function undo()
    {
        $this->opponent->setHealth($this->opponent->getCurrentHealth() + $this->damageDealt);
        $this->opponent->setStamina($this->stamina);
        $this->fightResultSet->of($this->opponent)->removeDamageDealt($this->damageDealt);
        $this->fightResultSet->of($this->opponent)->removeDamageReceived($this->damageDealt);
    }
}
