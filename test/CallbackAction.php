<?php
include_once dirname(__FILE__) . '/t/t.php';

$lime = new lime_test;

function hoge($v) {
    return $v . $v;
}

$p = new PEG_CallbackAction('hoge', PEG::token('hoge'));
$lime->is('hogehoge', $p->parse(PEG::context('hoge')));