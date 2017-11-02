<?php

use App\FirstVocal\Word;
use PHPUnit\Framework\TestCase;

class firstVocalTest extends TestCase
{
    // Execute before test
    public function setUp()
    { 
    }

    // Execute after test
    public function tearDown()
    {

    }

    public function testWord()
    {
        $word = new Word('testing');
        $this->assertSame('testing', $word->getWord());
    }

    public function testgetWordInMin()
    {
        $word = new Word('TesTing');
        $this->assertSame('testing', $word->getWord());
    }

    public function testNotVocalInWord()
    {
        $word = new Word('tstng');
        $this->assertSame(false, $word->getFirstVocal());
    }

    public function testGetFirstVocalInWord()
    {
        $word = new Word('testing');
        $this->assertSame('e', $word->getFirstVocal());
    }  
}