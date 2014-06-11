<?php

$loader = require_once __DIR__.'/vendor/autoload.php';

use Popsul\Calc\Tokenizer;

$data = "20.5 / (-35 + 1) * 5.5 ^ 3";

$tokenizer = new Tokenizer($data);
while ($token = $tokenizer->nextToken()) {
	printf("Token: %s\nMeta: %s\n\n", get_class($token), $token->getMeta()->getWord());
}