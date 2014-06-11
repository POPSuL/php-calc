<?php namespace Popsul\Calc\Token;

abstract class AbstractToken {

	/**
	 * @var TokenMeta
	 */
	private $meta = null;

	public function __construct(TokenMeta $meta) {
		$this->meta = $meta;
	}

	/**
	 * @return TokenMeta
	 */
	public function getMeta() {
		return $this->meta;
	}
}