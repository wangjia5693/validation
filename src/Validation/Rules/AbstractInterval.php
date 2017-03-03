<?php

/*
 * Created by PhpStorm.
 *

 *
 * For the full copyright and license information, please view the "LICENSE.md"
 * file that was distributed with this source code.
 */

namespace Validation\Rules;

use DateTime;
use Exception;

abstract class AbstractInterval extends AbstractRule
{
    public $interval;
    public $inclusive;

    public function __construct($interval, $inclusive = true)
    {
        $this->interval = $interval;
        $this->inclusive = $inclusive;
    }

    protected function filterInterval($value)
    {
        if (!is_string($value) || is_numeric($value) || empty($value)) {
            return $value;
        }

        if (strlen($value) == 1) {
            return $value;
        }

        try {
            return new DateTime($value);
        } catch (Exception $e) {
            // Pokémon Exception Handling
        }

        return $value;
    }
}
