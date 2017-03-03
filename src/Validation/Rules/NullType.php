<?php

/*
 * Created by PhpStorm.
 *

 *
 * For the full copyright and license information, please view the "LICENSE.md"
 * file that was distributed with this source code.
 */

namespace Validation\Rules;

class NullType extends NotEmpty
{
    public function validate($input)
    {
        return is_null($input);
    }
}