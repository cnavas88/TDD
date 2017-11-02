<?php

use App\Tenis\Player;
use PHPUnit\Framework\TestCase;

class tenisTest extends TestCase
{
    // Execute before test
    public function setUp()
    {
    }

    // Execute after test
    public function tearDown()
    {

    }

    public function testInitialScore()
    {
        $player = new Player();
        $this->assertEquals(0, $player->getScore());
    }

    public function testFirstPoint()
    {
        $player = new Player();
        $player->winPoint();
        $this->assertEquals('15', $player->getScore());
    }

    public function testSecondPoint()
    {
        $player = new Player(1);
        $player->winPoint();
        $this->assertEquals('30', $player->getScore());
    }

    public function testThirdPoint()
    {
        $player = new Player(2);
        $player->winPoint();
        $this->assertEquals('40', $player->getScore());
    }

    public function testPlayerWin()
    {
        $player1 = new Player(3);
        $player2 = new Player();
        $player1->winPoint($player2);
        $this->assertEquals('win', $player1->getScore());
    }

    public function testAdvantatge()
    {
        $player1 = new Player(3);
        $player2 = new Player(3);
        $player1->winPoint($player2);
        $this->assertEquals('advantage', $player1->getScore());        
    }

    public function testPlayerScoreOtherPlayerLosesAdcantage()
    {
        $player1 = new Player(4);   // Adventage
        $player2 = new Player(3);   // 40
        $player2->winPoint($player1);
        $this->assertEquals('40', $player1->getScore());        
        $this->assertEquals('40', $player2->getScore());        
    }

    public function testPlayerWithAdvantageScoreAndWin()
    {
        $player1 = new Player(4);   // Adventage
        $player2 = new Player(3);   // 40

        $player1->winPoint($player2);
        $this->assertEquals('win', $player1->getScore());
    }   
}