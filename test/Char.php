<?php
include_once dirname(__FILE__) . '/t/t.php';

$t = new lime_test;

$p = PEG::char('abc');

$t->is($p->parse(PEG::context('a')), 'a');
$t->is($p->parse(PEG::context('d')), PEG::failure());

$p = PEG::char('abc', true);

$t->is($p->parse(PEG::context('b')), PEG::failure());
$t->is($p->parse(PEG::context('d')), 'd');

$p = PEG::char('0');
$t->ok($p->parse(PEG::context('')) instanceof PEG_Failure);
