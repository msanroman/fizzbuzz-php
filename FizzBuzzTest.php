<?php

require_once 'FizzBuzz.php';
require_once 'CheckerInterface.php';

class FizzBuzzTest extends \PHPUnit_Framework_TestCase
{

	public function setUp() {

		$this->checker = $this->getMock('CheckerInterface');
		$checkers = array($this->checker);
		$this->fizzbuzz = new FizzBuzz($checkers);
	}

	public function finalSetup() {

		$fizzChecker = new FizzChecker();
		$buzzChecker = new BuzzChecker();
		$checkers = array(new FizzBuzzChecker($fizzChecker, $buzzChecker), $fizzChecker, $buzzChecker);
    	$this->fizzbuzz = new FizzBuzz($checkers);
	}

    /**
     * @test
     */
    public function itShouldReturn100Numbers() {
        $this->assertCount(100, $this->fizzbuzz->play());
    }

    /**
     * @test
     */
    public function forANormalPositionShouldHaveItsPositionAsValue() {
    	$result = $this->fizzbuzz->play();
    	$this->assertEquals(1, $result[1]);
    }

   	/**
   	 * @test
   	 */
   	public function forANumberTranslatableShouldReturnItsCheckerTranslation() {

		$this->checker
			->expects($this->at(2))
			->method('check')
			->with(3)
			->will($this->returnValue(true));

		$this->checker
			->expects($this->once())
			->method('getTranslation')
			->will($this->returnValue('Fizz'));

   		$result = $this->fizzbuzz->play();
   		$this->assertEquals('Fizz', $result[3]);
   	}

   	/**
   	 * @test
   	 */
   	public function finalTest() {

   		$this->finalSetup();
   		$result = $this->fizzbuzz->play();
   		foreach($result as $number) {
   			echo $number ."\n";
   		}
   	}
}
