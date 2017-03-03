<?php

/*
 * Created by PhpStorm.
 *

 *
 * For the full copyright and license information, please view the "LICENSE.md"
 * file that was distributed with this source code.
 */

namespace Validation\Exceptions;

class EachException extends NestedValidationException
{
    public static $defaultTemplates = [
        self::MODE_DEFAULT => [
            self::STANDARD => 'Each item in {{name}} must be valid',
        ],
        self::MODE_NEGATIVE => [
            self::STANDARD => 'Each item in {{name}} must not validate',
        ],
    ];
}
