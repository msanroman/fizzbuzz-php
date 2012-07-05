<?php

require_once 'CheckerInterface.php';

class BuzzChecker implements CheckerInterface {
	
	public function check($number) {
		return $number % 5 == 0;
	}

	public function getTranslation() {
		return 'Buzz';
	}
}