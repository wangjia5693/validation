<?php

/*
 *  * 数组验证；空数组 为true，new ArrayObject 为false;
 */

namespace Validation\Rules;

class ArrayType extends AbstractRule
{
    public function validate($input)
    {
        return is_array($input);
    }
}
