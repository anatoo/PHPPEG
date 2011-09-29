<?php
include_once dirname(__FILE__) . '/t/t.php';

$lime = new lime_test;

$optional = PEG::optional(PEG::token('hoge'));
$lime->is($optional->parse(PEG::context('fuga')), false);
$lime->is($optional->parse(PEG::context('hoge')), 'hoge');