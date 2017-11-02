<?php namespace App\FirstVocal;

class Word
{
    protected $word = null;

    public function __construct($word)
    {
        $this->word = strtolower($word);
    }

    public function getWord()
    {
        return $this->word;
    }

    public function getFirstVocal()
    {
        foreach (str_split($this->word) as $letter)
        {
            if (preg_match('/[aeiou]/i', $letter))
            {
                return $letter;
            }
        }

        return false;
    }
}