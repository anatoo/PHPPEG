<?php
include_once dirname(__FILE__) . '/t/t.php';

$lime = new lime_test;

$p = PEG::at(0, PEG::many(PEG::token('a')));
$c = PEG::context('aaaaaaaaa');

$lime->is($p->parse($c), 'a');
