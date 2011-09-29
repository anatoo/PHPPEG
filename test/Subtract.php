<?php
include_once dirname(__FILE__) .'/t/t.php';

$t = new lime_test;

$p = PEG::subtract(PEG::char('abc'), 'a');

$t->is($p->parse(PEG::context('a')), PEG::failure());
$t->is($p->parse(PEG::context('b')), 'b');