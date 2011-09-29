<?php
include_once dirname(__FILE__) . '/t/t.php';

$t = new lime_test;

$parser = PEG::token('a');
$t->is(PEG::matchAll($parser, 'abbabbbba'), array('a', 'a', 'a'));
$t->is(PEG::matchAll($parser, 'hogehoge'), array());