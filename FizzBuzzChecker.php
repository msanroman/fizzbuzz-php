<?php

require_once 'CheckerInterface.php';

class FizzBuzzChecker implements CheckerInterface {
	
	public function __construct(CheckerInterface $fizzChecker, CheckerInterface $buzzChecker) {
		$this->fizzChecker = $fizzChecker;
		$this->buzzChecker = $buzzChecker;
	}

	public function check($number) {

		return $this->fizzChecker->check($number) && $this->buzzChecker->check($number);
	}

	public function getTranslation() {

		return $this->fizzChecker->getTranslation().$this->buzzChecker->getTranslation();
	}
}