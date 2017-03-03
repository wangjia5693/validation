<?php

/*
 * Created by PhpStorm.
 *

 *
 * For the full copyright and license information, please view the "LICENSE.md"
 * file that was distributed with this source code.
 */

namespace Validation\Exceptions;

class SubdivisionCodeException extends ValidationException
{
    public static $defaultTemplates = [
        self::MODE_DEFAULT => [
            self::STANDARD => '{{name}} must be a valid subdivision code for {{countryCode}}',
        ],
        self::MODE_NEGATIVE => [
            self::STANDARD => '{{name}} must not be a valid subdivision code for {{countryCode}}',
        ],
    ];
}
