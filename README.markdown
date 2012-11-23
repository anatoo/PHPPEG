PHPPEG
====

PEG Parser Combinator for PHP5.

Install
----

Use [composer](http://getcomposer.org/) to install this library.

    $ mkdir foobar && cd foobar
    $ echo '{"require": {"phppeg/phppeg": "*"}}' >  composer.json
    $ composer install

And include "vendor/autoload.php" to setup auto-loading for PHPPEG in your code.

    <?php
    include_once __DIR__ . '/vendor/autoload.php';

How to run tests and examples
----

Execute setup.sh after git-clone to setup auto-loading.

    $ git clone https://github.com/anatoo/PHPPEG.git
    $ cd PHPPEG
    $ ./setup.sh

Run all tests:

    $ php test/t/testall.php

Run examples:

    $ php examples/example01.php

