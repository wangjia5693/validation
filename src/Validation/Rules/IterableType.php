<?php

/*
 * Created by PhpStorm.
 *

 *
 * For the full copyright and license information, please view the "LICENSE.md"
 * file that was distributed with this source code.
 */

namespace Validation\Rules;

class IterableType extends AbstractRule
{
    public function validate($input)
    {
        return is_array($input) ||
            $input instanceof \stdClass ||
            $input instanceof \Traversable;
    }
}
