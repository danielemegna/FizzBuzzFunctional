<?php

class FizzBuzzTest extends PHPUnit_Framework_TestCase 
{
  private $fb;

  function setUp()
  {
    $this->fb = new FizzBuzz();
  }

  function testIsRunning()
  {
    $this->assertTrue(true);
  }

  function testFizzBuzzCanRun()
  {
    $this->assertTrue(method_exists($this->fb, 'run'));
  }

  function testFizzBuzzReturns1WithOne()
  {
    $this->assertEquals('1', $this->fb->run(1));
  } 

  function testRunReturnsFizzWithThree()
  {
    $this->assertEquals('Fizz', $this->fb->run(3));
  }

  function testRunReturnsFizzWithSix()
  {
    $this->assertEquals('Fizz', $this->fb->run(6));
  }

  function testRunReturnsBuzzWithTen()
  {
    $this->assertEquals('Buzz', $this->fb->run(10));
  }

  function testRunReturnsFizzBuzzWithFifteen()
  {
    $this->assertEquals('FizzBuzz', $this->fb->run(15));
  }

  function testRunWithSomeNumbers()
  {
    $this->assertEquals('Buzz', $this->fb->run(20));
    $this->assertEquals('Fizz', $this->fb->run(9));
    $this->assertEquals('FizzBuzz', $this->fb->run(30));
    $this->assertEquals('13', $this->fb->run(13));
    $this->assertEquals('16', $this->fb->run(16));
  }

  function testIntroducingBang()
  {
    $this->assertEquals('Bang', $this->fb->run(7));
    $this->assertEquals('Bang', $this->fb->run(14));
    $this->assertEquals('FizzBang', $this->fb->run(21));
    $this->assertEquals('FizzBuzzBang', $this->fb->run(105));
  }
  
}

class FizzBuzz
{
  private $dictionary;

  function __construct()
  {
    $this->dictionary = [
      3 => "Fizz",
      5 => "Buzz",
      7 => "Bang"
    ];
  }
  
  function run($n)
  {
    $factors = array_keys($this->dictionary);
    $isNDivisibileByFactor = function($factor) use($n) { 
      return (($n % $factor) == 0);
    };

    $involvedFactors = array_values(
      array_filter($factors, $isNDivisibileByFactor)
    );

    if(sizeof($involvedFactors) == 0)
      return $n;

    $translateWithDictionary = function($carry, $item) {
      return $carry . $this->dictionary[$item];
    };
    return array_reduce($involvedFactors, $translateWithDictionary, '');
  }

}
