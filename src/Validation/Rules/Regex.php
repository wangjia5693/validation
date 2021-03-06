<?php

/*
 * Created by PhpStorm.
 *

 *
 * For the full copyright and license information, please view the "LICENSE.md"
 * file that was distributed with this source code.
 */

namespace Validation\Rules;

class Regex extends AbstractRule
{
    public $regex;

    public function __construct($regex)
    {
        $this->regex = $regex;
    }

    public function validate($input)
    {
        return (bool) preg_match($this->regex, $input);
    }
}
