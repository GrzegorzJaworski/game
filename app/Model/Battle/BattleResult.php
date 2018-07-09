<?php
namespace App\Model\Battle;


use App\Model\Character\Character;

class BattleResult
{
    private $winner;
    private $loser;
    private $rounds;

    /**
     * BattleResult constructor.
     * @param Character|null $winner
     * @param Character|null $loser
     * @param array $rounds
     */
    public function __construct(Character $winner = null, Character $loser = null, array $rounds)
    {
        $this->winner = $winner;
        $this->loser = $loser;
        $this->rounds = $rounds;
    }

    /**
     * @return Character
     */
    public function getWinner(): Character
    {
        return $this->winner;
    }

    /**
     * @return Character
     */
    public function getLoser(): Character
    {
        return $this->loser;
    }

    /**
     * @return array
     */
    public function getRounds(): array
    {
        return $this->rounds;
    }
}