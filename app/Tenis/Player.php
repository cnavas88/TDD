<?php namespace App\Tenis;

define('ZERO', '0');
define('FIFTEEN', '15');
define('THIRTEEN', '30');
define('FORTY', '40');
define('ADV', 'advantage');
define('WIN', 'win');

class Player 
{
    private $scores = [ZERO, FIFTEEN, THIRTEEN, FORTY, ADV, WIN];
    private $score;

    public function __construct($score = 0)
    {
        $this->score = $score;
    }

    public function getScore()
    {
        return $this->scores[$this->score];
    }

    public function winPoint($other = null)
    {
        if (empty($other))
        {
            $this->score++;
            return;
        }

        if ($other->getScore() == 'advantage')
        {
            $other->score -= 1;
            return;
        }

        if ($this->getScore() == '40' && $other->getScore() != '40')
        {
            $this->score += 2;
        }
        else
        {
            $this->score++;
        }
    }

    public function isWinner()
    {
        return $this->score == 4;
    }
}