<?php namespace Popsul\Calc\Token;

final class TokenMeta {

	private $word = "";

	public function __construct($word) {
		$this->word = $word;
	}

	public function getWord() {
		return $this->word;
	}
}