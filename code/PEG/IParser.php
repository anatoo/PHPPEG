<?php
/**
 * @package PEG
 * @author anatoo<anatoo.jp@gmail.com>
 * @license http://www.opensource.org/licenses/mit-license.php MIT License
 *
 */

interface PEG_IParser
{
    /**
     * パースに失敗した場合はPEG_Failureを返すこと。
     * 成功した場合はなんらかの値を返すこと。
     * 
     * @param PEG_IContext $c
     * @return mixed
     */
    function parse(PEG_IContext $c);
}
