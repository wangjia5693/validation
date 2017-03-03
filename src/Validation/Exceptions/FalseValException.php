<?php

/*
 * Created by PhpStorm.
 *

 *
 * For the full copyright and license information, please view the "LICENSE.md"
 * file that was distributed with this source code.
 */

namespace Validation\Exceptions;

class FalseValException extends ValidationException
{
    public static $defaultTemplates = [
        self::MODE_DEFAULT => [
            self::STANDARD => '{{name}} is not considered as "False"',
        ],
        self::MODE_NEGATIVE => [
            self::STANDARD => '{{name}} is considered as "False"',
        ],
    ];
}
