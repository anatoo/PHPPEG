<?php
include_once dirname(__FILE__) . '/t/t.php';

$lime = new lime_test;

$anything = PEG::anything();

$lime->is('a', $anything->parse(PEG::context('a')));