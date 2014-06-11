<?php namespace Popsul\Calc\Token;

class BracketToken extends AbstractToken {

	const typeOpen = "open";
	const typeClose = "close";
	const typeUndef = "undef";

	private $type = self::typeUndef;

	public function __construct(TokenMeta $meta) {
		parent::__construct($meta);
		switch ($meta->getWord()) {
			case '(':
				$this->type = self::typeOpen;
				break;
			case ')':
				$this->type = self::typeClose;
				break;
			default:
				$this->type = self::typeUndef;
		}
	}

	public function  getType() {
		return $this->type;
	}
}