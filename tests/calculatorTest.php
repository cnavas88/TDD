<?php

use App\Calculator\Calculator;
use PHPUnit\Framework\TestCase;

class calculatorTest extends TestCase
{
    protected $calc;

    // Execute before test
    public function setUp()
    {
        $this->calc = new Calculator();
    }

    // Execute after test
    public function tearDown()
    {

    }

    public function testCalculatorToZero()
    {
        $this->assertSame(0, $this->calc->getResult());
    }

    public function testAddNumber()
    {
        $this->calc->add(7);
        $this->assertSame(7, $this->calc->getResult());
    }

    public function testRequiredNumericValues()
    {
        try
        {
            $this->calc->add('four');
        }
        catch(\InvalidArgumentException $e)
        {
            $this->assertEquals('This is not a number.', $e->getMessage());
        }
    }

    public function testAcceptsMultipleArgs()
    {
        $this->calc->add(2, 4, 3);

        $this->assertEquals(9, $this->calc->getResult());
        $this->assertNotEquals('This is not a number.', $this->calc->getResult());        
    }

    public function testSubstractNumber()
    {
        $this->calc->substract(4);
        $this->assertEquals(-4, $this->calc->getResult());
    }
}