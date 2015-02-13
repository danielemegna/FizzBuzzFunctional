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
  
}

class FizzBuzz
{
  function run($n)
  {
    $isNDivisibileByFactor = function($factor) use($n) { 
      return (($n % $factor) == 0);
    };

    $dictionary = [
      3 => "Fizz",
      5 => "Buzz"
    ];

    $factors = array_keys($dictionary);
    $result = array_values(
      array_filter($factors, $isNDivisibileByFactor)
    );

    if(sizeof($result) == 0)
      return $n;

    $string = '';
    foreach($result as $factor)
      $string .= $dictionary[$factor]; 

    return $string;

  }

}
