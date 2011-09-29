<?php
include_once dirname(__FILE__) . '/t/t.php';

$lime = new lime_test;
$join = PEG::join(PEG::seq('b', PEG::many('a')));

$context = PEG::context('baaa');
$lime->is($join->parse($context), 'baaa');
