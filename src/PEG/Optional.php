<?php
/**
 * @package PEG
 * @author anatoo<anatoo.jp@gmail.com>
 * @license http://www.opensource.org/licenses/mit-license.php MIT License
 *
 */

class PEG_Optional implements PEG_IParser
{
    protected $parser;
    function __construct(PEG_IParser $p)
    {
        $this->parser = $p;
    }
    function parse(PEG_IContext $context)
    {
        $offset = $context->tell();
        $result = $this->parser->parse($context);
        if ($result instanceof PEG_Failure) {
            $context->seek($offset);
            return false;
        }
        return $result;
    }
}
