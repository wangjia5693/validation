<?php

/*
 * Created by PhpStorm.
 *

 *
 * For the full copyright and license information, please view the "LICENSE.md"
 * file that was distributed with this source code.
 */

namespace Validation\Exceptions;

class InException extends ValidationException
{
    public static $defaultTemplates = [
        self::MODE_DEFAULT => [
            self::STANDARD => '{{name}} must be in {{haystack}}',
        ],
        self::MODE_NEGATIVE => [
            self::STANDARD => '{{name}} must not be in {{haystack}}',
        ],
    ];
}
