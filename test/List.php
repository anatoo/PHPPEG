<?php
include_once dirname(__FILE__) . '/t/t.php';

$lime = new lime_test;
$list = PEG::listof(PEG::digit(), ',');

$context = PEG::context('1,2,3,4');
$lime->is($list->parse($context), array('1', '2', '3', '4'));