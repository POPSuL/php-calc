<?php namespace Popsul\Calc;

use Popsul\Calc\Token\AbstractToken;
use Popsul\Calc\Token\TokenFactory;
use Popsul\Calc\Token\TokenMeta;

class Tokenizer {

	const delimiters = "()+-*/^ ";

	private $data = null;

	private $position = -1;

	private $length = 0;

	public function __construct($data) {
		$this->data = $data;
		$this->length = mb_strlen($data);

	}

	/**
	 * @throws UnexpectedLetterException
	 * @return null|AbstractToken
	 */
	public function nextToken() {
		$number = "";
		$dotProvided = false;
		while($this->position < $this->length - 1) {
			$this->position++;

			$ch = $this->charAt($this->position);
			//printf("char: %s\npos: %d\nnumber: %s\n\n", $ch, $this->position, $number);
			if ($this->isDelimiter($ch) && $number != "") {
				$this->position--;
				break;
			} else if ($this->isDelimiter($ch) && $ch != " ") {
				return TokenFactory::getToken(new TokenMeta($ch));
			} else if ($ch == " ") {
				if ($number == "") {
					continue;
				} else {
					$this->position--;
					break;
				}
			} else if (($ch >= 0 && $ch <= 9) || $ch == ".") {
				if ($ch == ".") {
					if ($dotProvided) {
						throw new UnexpectedLetterException(sprintf("Unexpected dot at %d", $this->position));
					}
					$dotProvided = true;
				}
				$number .= $ch;
			}
		}
		if ($number != null) {
			return TokenFactory::getToken(new TokenMeta($number));
		}
		return null;
	}

	private function charAt($idx) {
		return mb_substr($this->data, $idx, 1);
	}

	private function substr($start, $length) {
		return mb_substr($this->data, $start, $length);
	}

	private function isDelimiter($char) {
		return strpos(self::delimiters, $char) !== false;
	}
}