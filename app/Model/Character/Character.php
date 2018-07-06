<?php

namespace App\Model\Character;


use App\Model\Skill\Skill;

abstract class Character
{
    protected $skills = [];
    protected $name;
    protected $health;
    protected $strength;
    protected $defence;
    protected $speed;
    protected $luck;

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return int
     */
    public function getHealth(): int
    {
        return $this->health;
    }

    /**
     * @return int
     */
    public function getStrength(): int
    {
        return $this->strength;
    }

    /**
     * @return int
     */
    public function getDefence(): int
    {
        return $this->defence;
    }

    /**
     * @return int
     */
    public function getSpeed(): int
    {
        return $this->speed;
    }

    /**
     * @return int
     */
    public function getLuck(): int
    {
        return $this->luck;
    }

    /**
     * @param int $health
     */
    public function setHealth($health): void
    {
        $this->health = $health;
    }

    /**
     * @param Skill $skill
     */
    public function setSkill(Skill $skill)
    {
        if (!in_array($skill, $this->skills)){
            $this->skills[] = $skill;
        }
    }

    /**
     * @param array $skills
     */
    public function setSkills(array $skills)
    {
        $this->skills = array_unique(array_merge($this->skills, $skills), SORT_REGULAR);
    }

    /**
     * @return array|Skill
     */
    public function getSkills(): array
    {
        return $this->skills;
    }
}