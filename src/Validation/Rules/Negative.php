<?php

/*
 * Created by PhpStorm.
 *

 *
 * For the full copyright and license information, please view the "LICENSE.md"
 * file that was distributed with this source code.
 */

namespace Validation\Rules;

class Negative extends AbstractRule
{
    public function validate($input)
    {
        return $input < 0;
    }
}
