<?php

/*
 * Created by PhpStorm.
 *

 *
 * For the full copyright and license information, please view the "LICENSE.md"
 * file that was distributed with this source code.
 */

namespace Validation\Rules;

class Call extends AbstractRelated
{
    public function getReferenceValue($input)
    {
        return call_user_func_array($this->reference, [&$input]);
    }

    public function hasReference($input)
    {
        return is_callable($this->reference);
    }
}
