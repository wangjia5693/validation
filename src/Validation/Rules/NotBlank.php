<?php

/*
 * Created by PhpStorm.
 *

 *
 * For the full copyright and license information, please view the "LICENSE.md"
 * file that was distributed with this source code.
 */

namespace Validation\Rules;

use stdClass;

class NotBlank extends AbstractRule
{
    public function validate($input)
    {
        if (is_numeric($input)) {
            return $input != 0;
        }

        if (is_string($input)) {
            $input = trim($input);
        }

        if ($input instanceof stdClass) {
            $input = (array) $input;
        }

        if (is_array($input)) {
            $input = array_filter($input, __METHOD__);
        }

        return !empty($input);
    }
}
