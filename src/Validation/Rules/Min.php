<?php

/*
 * Created by PhpStorm.
 *

 *
 * For the full copyright and license information, please view the "LICENSE.md"
 * file that was distributed with this source code.
 */

namespace Validation\Rules;

class Min extends AbstractInterval
{
    public function validate($input)
    {
        if ($this->inclusive) {
            return $this->filterInterval($input) >= $this->filterInterval($this->interval);
        }

        return $this->filterInterval($input) > $this->filterInterval($this->interval);
    }
}
