<?php

namespace App\Service;


use App\Model\Battle\BattleResult;
use App\Model\Character\Character;
use App\Model\Character\Hero;
use App\Model\Skill\Skill;

class BattleManager
{

    /**
     * @var Lottery
     */
    private $lottery;

    /**
     * @var Attack
     */
    private $attack;

    public function __construct()
    {
        $this->lottery = new Lottery();
        $this->attack = new Attack();
    }

    /**
     * @param Character $hero
     * @param Character $beast
     * @return BattleResult
     */
    public function battle(Character $hero, Character $beast): BattleResult
    {
        $attackerAndDefenderArray = $this->setAttackerAndDefender($hero, $beast);

        /** @var Character $attacker */
        $attacker = $attackerAndDefenderArray['attacker'];

        /** @var Character $defender */
        $defender = $attackerAndDefenderArray['defender'];

        $rounds = [];
        while ($hero->getHealth() > 0 && $beast->getHealth() > 0 && count($rounds) <= 20) {
            $round = new Round();
            $round->setAttacker($attacker);
            $round->setDefender($defender);

            if (!$this->lottery->doesHaveLuck($defender)){
                $fightResult = $this->fight($attacker, $defender);
                $defender->setHealth($defender->getHealth()-$fightResult['damage']);

                $round->doesDefenderGetLucky(false);
                $round->setDamage($fightResult['damage']);
                $round->setUsedSkills($fightResult['usedSkills']);
                $round->setDefenderHealth($defender);
            }else {
                $round->doesDefenderGetLucky(true);
                $round->setDefenderHealth($defender);
            }
            $rounds[] = $round;
            $temp = $attacker;
            $attacker = $defender;
            $defender = $temp;
        }

        if ($hero->getHealth() == 0) {
            $winner = $beast;
            $loser = $hero;
        }elseif ($beast->getHealth() == 0) {
            $winner = $hero;
            $loser = $beast;
        }else {
            switch ($hero->getHealth() <=> $beast->getHealth()) {
                case 1:
                    $winner = $hero;
                    $loser = $beast;
                    break;
                case -1:
                    $winner = $beast;
                    $loser = $hero;
                    break;
                default:
                    $winner = null;
                    $loser = null;
            }
        }

        return new BattleResult($winner, $loser, $rounds);

    }

    /**
     * @param Character $hero
     * @param Character $beast
     * @return array
     */
    private function setAttackerAndDefender(Character $hero, Character $beast): array
    {
        $attackerAndDefenderArray = [];
        switch ($hero->getSpeed() <=> $beast->getSpeed()) {
            case -1:
                $attackerAndDefenderArray = ['attacker' => $beast, 'defender' => $hero];
                break;
            case 1:
                $attackerAndDefenderArray = ['attacker' => $hero, 'defender' => $beast];
                break;
            case 0:
                if ($hero->getLuck() >= $beast->getLuck()){
                    $attackerAndDefenderArray = ['attacker' => $beast, 'defender' => $hero];
                }else{
                    $attackerAndDefenderArray = ['attacker' => $hero, 'defender' => $beast];
                }
                break;
        }

        return $attackerAndDefenderArray;
    }

    /**
     * @param Character $attacker
     * @param Character $defender
     * @return array
     */
    private function fight(Character $attacker, Character $defender): array
    {
        $damage = 0;
        $usedSkills = [];
        $skillManager = new SkillManager();

        if ($attacker instanceof Hero) {
            $skills = $attacker->getOffenseSkills();
        } else {
            $skills = $defender->getDefenseSkills();
        }

        /** @var Skill $skill */
        foreach ($skills as $skill) {
            if ($this->lottery->doesUseSkill($skill)){
                $damage += $skillManager->useSkill($skill, $attacker, $defender);
                $usedSkills[] = $skill;
            }else{
                $damage = $this->attack->strike($attacker, $defender);
            }
        }

        return [
            'damage' => $damage,
            'usedSkills' => $usedSkills
        ];
    }
}