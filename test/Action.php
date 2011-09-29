<?php
include_once dirname(__FILE__) . '/t/t.php';

class MyActionParser extends PEG_Action
{
    function process($result)
    {
        return join('', $result);
    }
}

$lime = new lime_test;
$action = new MyActionParser(PEG::many(PEG::token('hoge')));

$lime->is($action->parse(PEG::context('hogehogehogehoge')), 'hogehogehogehoge');