<?php
include_once dirname(__FILE__) . '/t/t.php';

$t = new lime_test;
$choice = PEG::choice(PEG::token('hoge'), PEG::token('fuga'));
$t->is($choice->parse(PEG::context('hoge')), 'hoge');
$t->is($choice->parse($c = PEG::context('fuga')), 'fuga');
$t->is($c->tell(), 4);