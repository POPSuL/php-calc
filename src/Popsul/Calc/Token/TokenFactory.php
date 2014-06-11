<?php namespace Popsul\Calc\Token;

class TokenFactory {

	private static $tokens = [
		"(" => '\Popsul\Calc\Token\BracketToken',
		")" => '\Popsul\Calc\Token\BracketToken',
		"+" => '\Popsul\Calc\Token\PlusToken',
		"-" => '\Popsul\Calc\Token\MinusToken',
		"*" => '\Popsul\Calc\Token\MulToken',
		"/" => '\Popsul\Calc\Token\DivToken',
		"^" => '\Popsul\Calc\Token\PowToken',
	];

	public static function getToken(TokenMeta $meta) {
		$word = $meta->getWord();
		if (isset(self::$tokens[$word])) {
			return new self::$tokens[$word]($meta);
		}
		return new NumberToken($meta);
	}
}