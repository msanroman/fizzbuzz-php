<?php

require_once 'FizzBuzzChecker.php';
require_once 'CheckerInterface.php';

class FizzBuzzCheckerTest extends \PHPUnit_Framework_TestCase {

	public function setUp() {

		$this->fizzChecker = $this->getMock('CheckerInterface');
		$this->buzzChecker = $this->getMock('CheckerInterface');
		$this->checker = new FizzBuzzChecker($this->fizzChecker, $this->buzzChecker);
	}

	/**
	 * @test
	 */
	public function itShouldReturnTrueWhenCheckingAFizzBuzzNumber() {

		$number = 15;
		$this->fizzChecker
			->expects($this->once())
			->method('check')
			->with($number)
			->will($this->returnValue(true));

		$this->buzzChecker
			->expects($this->once())
			->method('check')
			->with($number)
			->will($this->returnValue(true));
		
		$this->assertTrue($this->checker->check($number));
	}

	/**
	 * @test
	 */
	public function itShouldReturnFalseWhenCheckingANonFizzBuzzNumber() {	

		$number = 5;
		$this->fizzChecker
			->expects($this->once())
			->method('check')
			->with($number)
			->will($this->returnValue(false));

		$this->buzzChecker
			->expects($this->never())
			->method('check');

		$this->assertFalse($this->checker->check($number));
	}

	/**
	 * @test
	 */
	public function itsTranslationIsFizz() {

		$this->fizzChecker
			->expects($this->once())
			->method('getTranslation')
			->will($this->returnValue('Fizz'));

		$this->buzzChecker
			->expects($this->once())
			->method('getTranslation')
			->will($this->returnValue('Buzz'));

		$this->assertEquals('FizzBuzz', $this->checker->getTranslation());
	}
}