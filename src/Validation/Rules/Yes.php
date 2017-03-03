<?php

/*
 * Created by PhpStorm.
 *

 *
 * For the full copyright and license information, please view the "LICENSE.md"
 * file that was distributed with this source code.
 */

namespace Validation\Rules;

class Yes extends Regex
{
    public function __construct($useLocale = false)
    {
        $pattern = '^y(eah?|ep|es)?$';
        if ($useLocale && defined('YESEXPR')) {
            $pattern = nl_langinfo(YESEXPR);
        }

        parent::__construct('/'.$pattern.'/i');
    }
}
