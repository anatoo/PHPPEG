<?php
/**
 * @package PEG
 * @author anatoo<anatoo@nequal.jp>
 * @license http://www.opensource.org/licenses/mit-license.php MIT License
 * @version $Id: InstantParser.php 1606 2010-02-02 08:01:40Z anatoo $
 */

class PEG_InstantParser implements PEG_IParser
{
    protected $callback;

    function __construct($callback)
    {
        $this->callback = $callback;
    }

    function parse(PEG_IContext $context)
    {
        return call_user_func($this->callback, $context);
    }
}
