<?php
include_once dirname(__FILE__) . '/t/t.php';

$t = new lime_test;
$parser = PEG::token('hoge');
$t->is(PEG::_match($parser, PEG::context('ahoge')), 'hoge');
$t->is(PEG::_match($parser, PEG::context('ahoge'), true), array('hoge', 1));
$t->is(PEG::_match($parser, PEG::context('a')), PEG::failure());
$t->is(PEG::_match($parser, PEG::context('a'), true), array(PEG::failure(), null));