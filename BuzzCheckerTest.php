<?php

require_once 'BuzzChecker.php';

class BuzzCheckerTest extends PHPUnit_Framework_TestCase {
	
	public function setUp() {
		$this->checker = new BuzzChecker();
	}

	/**
	 * @test
	 */
	public function itReturnsTrueForBuzzNumbers() {

		$this->assertTrue($this->checker->check(5));
	}
	
	/**
	 * @test
	 */
	public function itReturnsFalseForBuzzNumbers() {

		$this->assertFalse($this->checker->check(3));
	}

	/**
	 * @test
	 */
	public function itsTranslationIsBuzz() {

		$this->assertEquals('Buzz', $this->checker->getTranslation());
	}
}