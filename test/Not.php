<?php
include_once dirname(__FILE__) . '/t/t.php';

$lime = new lime_test;

$parser = PEG::not(PEG::token('hoge'));

$lime->is($parser->parse($c = PEG::context('fuga')), 'fuga');
$lime->is($c->tell(), 0);
$lime->is($parser->parse(PEG::context('hoge')), PEG::failure());
$lime->is($parser->parse(PEG::context('')), PEG::failure());