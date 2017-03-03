<?php

/*
 * Created by PhpStorm.
 *

 *
 * For the full copyright and license information, please view the "LICENSE.md"
 * file that was distributed with this source code.
 */

namespace Validation\Rules;

/**
 * @author Henrique Moody <henriquemoody@gmail.com>
 */
class ResourceType extends AbstractRule
{
    /**
     * {@inheritdoc}
     */
    public function validate($input)
    {
        return is_resource($input);
    }
}