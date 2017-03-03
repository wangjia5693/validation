<?php

/*
* 检查字符串是否是字母
 */

namespace Validation\Rules;

class Alpha extends AbstractCtypeRule
{
    protected function filter($input)
    {
        return $this->filterWhiteSpaceOption($input);
    }

    protected function ctypeFunction($input)
    {
        return ctype_alpha($input);
    }
}
