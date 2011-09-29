<?php
/**
 * @package PEG
 * @author anatoo<anatoo@nequal.jp>
 * @license http://www.opensource.org/licenses/mit-license.php MIT License
 * @version $Id: Anything.php 1518 2010-01-16 07:07:44Z anatoo $
 */

/**
 * どのような要素にもヒットするパーサ
 *
 */
class PEG_Anything implements PEG_IParser
{
    function parse(PEG_IContext $context)
    {
        return $context->eos() ? PEG::failure() : $context->readElement();
    }
}
