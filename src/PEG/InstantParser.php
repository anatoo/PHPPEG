<?php
/**
 * @package PEG
 * @author anatoo<anatoo.jp@gmail.com>
 * @license http://www.opensource.org/licenses/mit-license.php MIT License
 *
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
