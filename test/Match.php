<?php
include_once dirname(__FILE__) . '/t/t.php';

$t = new lime_test;
$parser = PEG::token('hoge');
$t->is(PEG::match($parser, 'hoge'), 'hoge');
$t->is(PEG::match($parser, 'a'), PEG::failure());