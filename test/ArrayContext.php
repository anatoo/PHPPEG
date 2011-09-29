<?php
include_once dirname(__FILE__) . '/t/t.php';

$t = new lime_test;

$p = PEG::seq('a', 'a');
$c = PEG::context(array('a', 'a'));
$t->is($p->parse($c), array('a', 'a'));

$p = PEG::seq('(', PEG::choice(PEG::ref($ref), PEG::anything()), ')');
$ref = $p;
$c = PEG::context(array('(', 3, ')'));
$t->is($p->parse($c), array('(', 3, ')'));

$c = PEG::context(array('(', '(', 3, ')', ')'));
$t->is($p->parse($c), array('(', array('(', 3, ')'), ')'));
