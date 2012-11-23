<?php
/**
 * @package PEG
 * @author anatoo<anatoo.jp@gmail.com>
 * @license http://www.opensource.org/licenses/mit-license.php MIT License
 *
 */

/**
 * パースされる対象の終端にヒットするパーサ。
 *
 */
class PEG_EOS implements PEG_IParser
{
    function parse(PEG_IContext $c)
    {
        if ($c->eos()) return false;
        return PEG::failure();
    }
}
