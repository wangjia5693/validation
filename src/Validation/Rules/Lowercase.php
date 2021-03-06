<?php

/*
 * Created by PhpStorm.
 *

 *
 * For the full copyright and license information, please view the "LICENSE.md"
 * file that was distributed with this source code.
 */

namespace Validation\Rules;

class Lowercase extends AbstractRule
{
    public function validate($input)
    {
        return $input === mb_strtolower($input, mb_detect_encoding($input));
    }
}
