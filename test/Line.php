<?php
include_once dirname(__FILE__) . '/t/t.php';

$t = new lime_test;


$c = PEG::context('a
bbb
c');

$t->is(PEG::line()->parse($c), 'a
');
$t->is(PEG::line()->parse($c), 'bbb
');
$t->is(PEG::line()->parse($c), 'c');