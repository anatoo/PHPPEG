<?php
include_once dirname(__FILE__) . '/t/t.php';

$t = new lime_test;
$p = PEG::tail(PEG::seq("a", "b", "c"));
$c = PEG::context('abc');

$t->is($p->parse($c), 'c');