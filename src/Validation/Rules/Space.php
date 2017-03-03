<?php

/*
 * 是否是空白字符
 */

namespace Validation\Rules;

class Space extends AbstractCtypeRule
{
    protected function ctypeFunction($input)
    {
        return ctype_space($input);
    }
}
