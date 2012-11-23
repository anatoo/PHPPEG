<?php
include_once dirname(__FILE__) . '/../vendor/autoload.php';
include_once 'Benchmark/Timer.php';

/**
 * メモ化の有無での処理時間の差を見るサンプル
 * ここではメモ化するのとしないのとでは著しく違いが出る文法規則を元にパーサを組み立てている
 */

$t = new Benchmark_Timer;
$str = '((((((((1))))))))';


$t->start();

// メモ化していないパーサ
$a = PEG::ref($a_ref);
$p = PEG::ref($p_ref);
$a_ref = PEG::choice(
    PEG::seq($p, '+', $a),
    PEG::seq($p, '-', $a),
    $p
);
$p_ref = PEG::choice(
    PEG::seq('(', $a, ')'),
    '1'
);
$a->parse(PEG::context($str));
$t->setMarker('no memoize');

// メモ化しているパーサ
$a = PEG::ref($a_ref);
$p = PEG::ref($p_ref);
$a_ref = PEG::memo(PEG::choice(
    PEG::seq($p, '+', $a),
    PEG::seq($p, '-', $a),
    $p
));
$p_ref = PEG::memo(PEG::choice(
    PEG::seq('(', $a, ')'),
    '1'
));
$a->parse($c = PEG::context($str));
$t->setMarker('memoize');
$t->stop();
$t->display();

/* 結果
---------------------------------------------------------
marker       time index            ex time         perct   
---------------------------------------------------------
Start        1242400475.10093900   -                0.00%
---------------------------------------------------------
no memoize   1242400476.30805000   1.207111        99.74%
---------------------------------------------------------
memoize      1242400476.31115500   0.003105         0.26%
---------------------------------------------------------
Stop         1242400476.31117700   0.000022         0.00%
---------------------------------------------------------
total        -                     1.210238       100.00%
---------------------------------------------------------
 */
