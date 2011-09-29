<?php
include_once dirname(__FILE__) . '/t/t.php';

$lime = new lime_test;
$seq = PEG::seq(PEG::token('h'), PEG::token('o'));
$context = PEG::context('ho');

$lime->is($seq->parse($context), array('h', 'o'));