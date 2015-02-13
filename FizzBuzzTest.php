<?php

class FizzBuzzTest extends PHPUnit_Framework_TestCase 
{
  function testIsRunning()
  {
    $this->assertTrue(true);
  }

  function testFizzBuzzCanRun()
  {
    $f = new FizzBuzz();
    $this->assertTrue(method_exists($f, 'run'));
  }

  function testFizzBuzzReturnsInt()
  {
    $f = new FizzBuzz();
    $this->assertEquals('1', $f->run(1));
  } 

  function testRunReturnsFizzWithThree()
  {
    $f = new FizzBuzz();
    $this->assertEquals('Fizz', $f->run(3));
  }

  function testRunReturnsFizzWithSix()
  {
    $f = new FizzBuzz();
    $this->assertEquals('Fizz', $f->run(6));
  }

  function testRunReturnsBuzzWithTen()
  {
    $f = new FizzBuzz();
    $this->assertEquals('Buzz', $f->run(10));
  }

  function testRunReturnsFizzBuzzWithFifteen()
  {
    $f = new FizzBuzz();
    $this->assertEquals('FizzBuzz', $f->run(15));
  }

  function testRunWithSomeNumbers()
  {
    $f = new FizzBuzz();
    $this->assertEquals('Buzz', $f->run(20));
    $this->assertEquals('Fizz', $f->run(9));
    $this->assertEquals('FizzBuzz', $f->run(30));
  }

  function testIntroducingBang()
  {
    $f = new FizzBuzz();
    $this->assertEquals('Bang', $f->run(7));
    $this->assertEquals('Bang', $f->run(14));
    $this->assertEquals('FizzBang', $f->run(21));
    $this->assertEquals('FizzBuzzBang', $f->run(105));
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
