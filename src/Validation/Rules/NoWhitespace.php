<?php

/*
 * Created by PhpStorm.
 *

 *
 * For the full copyright and license information, please view the "LICENSE.md"
 * file that was distributed with this source code.
 */

namespace Validation\Rules;

class NoWhitespace extends AbstractRule
{
    public function validate($input)
    {
        if (is_null($input)) {
            return true;
        }

        if (false === is_scalar($input)) {
            return false;
        }

        return !preg_match('#\s#', $input);
    }
}
