<?php

/*
 * 判断是否是字母和数字或字母数字的组合
 */

namespace Validation\Rules;

class Alnum extends AbstractCtypeRule
{
    protected function filter($input)
    {
        return $this->filterWhiteSpaceOption($input);
    }

    protected function ctypeFunction($input)
    {
        return ctype_alnum($input);
    }
}
