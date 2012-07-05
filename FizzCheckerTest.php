<?php

require_once 'FizzChecker.php';

class FizzCheckerTest extends \PHPUnit_Framework_TestCase {

	/**
	 * @test
	 */
	public function itShouldReturnTrueWhenCheckingAFizzNumber() {
		$checker = new FizzChecker();
		$this->assertTrue($checker->check(3));
	}

	/**
	 * @test
	 */
	public function itShouldReturnFalseWhenCheckingANonFizzNumber() {
		$checker = new FizzChecker();
		$this->assertFalse($checker->check(1));
	}

	/**
	 * @test
	 */
	public function itsTranslationIsFizz() {
		$checker = new FizzChecker();
		$this->assertEquals('Fizz', $checker->getTranslation());
	}
}