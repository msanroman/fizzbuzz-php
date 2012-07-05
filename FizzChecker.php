<?php

require_once 'CheckerInterface.php';

class FizzChecker implements CheckerInterface {
	
	public function check($number) {

		return $number % 3 == 0;
	}

	public function getTranslation() {

		return 'Fizz';
	}

}