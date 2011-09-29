<?php
include_once dirname(__FILE__) . '/t/t.php';

$t = new lime_test;

$parser = PEG::listof(PEG::char('abc'), PEG::token(','));
$context = PEG::context('a,b,c');
$t->is($parser->parse($context), array('a', 'b', 'c'));
$t->ok($context->eos());