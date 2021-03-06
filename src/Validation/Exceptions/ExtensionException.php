<?php

/*
 * Created by PhpStorm.
 *

 *
 * For the full copyright and license information, please view the "LICENSE.md"
 * file that was distributed with this source code.
 */

namespace Validation\Exceptions;

/**
 * Exception class for Extension rule.
 *
 * @author Henrique Moody <henriquemoody@gmail.com>
 */
class ExtensionException extends ValidationException
{
    /**
     * @var array
     */
    public static $defaultTemplates = [
        self::MODE_DEFAULT => [
            self::STANDARD => '{{name}} must have {{extension}} extension',
        ],
        self::MODE_NEGATIVE => [
            self::STANDARD => '{{name}} must not have {{extension}} extension',
        ],
    ];
}
