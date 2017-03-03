<?php

/*
 * Created by PhpStorm.
 *

 *
 * For the full copyright and license information, please view the "LICENSE.md"
 * file that was distributed with this source code.
 */

if (version_compare(PHP_VERSION, '7.1', '<')) {
    eval('namespace Validation\Rules; class Iterable extends IterableType {}');
}
