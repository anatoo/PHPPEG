<?php
include_once dirname(__FILE__) . '/t/t.php';

$lime = new lime_test;
$many1 = PEG::many1(PEG::token('hoge'));

$lime->is($many1->parse(PEG::context('hoge')), array('hoge'));
$lime->is($many1->parse(PEG::context('')), PEG::failure());
$lime->is(array('hoge', 'hoge'), $many1->parse(PEG::context('hogehoge')));