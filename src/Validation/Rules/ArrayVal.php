<?php

/*
 * 数组验证；空数组，new ArrayObject 皆为true;
 */

namespace Validation\Rules;

class ArrayVal extends AbstractRule
{
    public function validate($input)
    {
        return is_array($input) || $input instanceof \ArrayAccess;
    }
}
