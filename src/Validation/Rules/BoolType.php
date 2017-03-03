<?php

/*
 * 是与否判断
 */

namespace Validation\Rules;

class BoolType extends AbstractRule
{
    public function validate($input)
    {
        return is_bool($input);
    }
}
