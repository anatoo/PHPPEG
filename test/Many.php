<?php
include_once dirname(__FILE__) . '/t/t.php';

$lime = new lime_test;

$many = PEG::many(PEG::token('a'));
$context = PEG::context('aaaaaaaa');
$lime->is($many->parse($context), array('a', 'a', 'a', 'a', 'a', 'a', 'a', 'a'));
$lime->is($context->tell(), 8);

$context = PEG::context('ab');
$parser = PEG::many(PEG::drop(PEG::token('ab')));
$lime->is($parser->parse($context), array());