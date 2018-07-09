<?php

namespace App\Model\Battle;


use App\Model\Character\Character;
use App\Exceptions\RoundsException;

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
     * @throws RoundsException
     */
    public function __construct(Character $winner = null, Character $loser = null, array $rounds)
    {
        $this->winner = $winner;
        $this->loser = $loser;

        foreach ($rounds as $round) {
            if (!$round instanceof Round) {
                throw new RoundsException;
            }
        }

        $this->rounds = $rounds;
    }

    /**
     * @return Character|null
     */
    public function getWinner(): ?Character
    {
        return $this->winner;
    }

    /**
     * @return Character|null
     */
    public function getLoser(): ?Character
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