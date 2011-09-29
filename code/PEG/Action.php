<?php
/**
 * @package PEG
 * @author anatoo<anatoo@nequal.jp>
 * @license http://www.opensource.org/licenses/mit-license.php MIT License
 * @version $Id: Action.php 1546 2010-01-20 13:10:44Z anatoo $
 */

abstract class PEG_Action implements PEG_IParser
{
    protected $parser;
    function __construct(PEG_IParser $p)
    {
        $this->parser = $p;
    }
    function parse(PEG_IContext $context)
    {
        $result = $this->parser->parse($context);
        return $result instanceof PEG_Failure ? $result : $this->process($result);
    }
    abstract protected function process($result);
}
