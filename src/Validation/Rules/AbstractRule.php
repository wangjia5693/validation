<?php

/*
 * Created by PhpStorm.
 *

 *
 * For the full copyright and license information, please view the "LICENSE.md"
 * file that was distributed with this source code.
 */

namespace Validation\Rules;

use Validation\Exceptions\ValidationException;
use Validation\Validatable;

abstract class AbstractRule implements Validatable
{
    protected $name;
    protected $template;

    public function __invoke($input)
    {
        return $this->validate($input);
    }

    public function assert($input)
    {
        if ($this->validate($input)) {
            return true;
        }
        throw $this->reportError($input);
    }

    public function check($input)
    {
        return $this->assert($input);
    }

    public function getName()
    {
        return $this->name;
    }

    public function reportError($input, array $extraParams = [])
    {
        $exception = $this->createException();
        $name = $this->name ?: ValidationException::stringify($input);
        $params = array_merge(
            get_class_vars(__CLASS__),
            get_object_vars($this),
            $extraParams,
            compact('input')
        );
        $exception->configure($name, $params);
        if (!is_null($this->template)) {
            $exception->setTemplate($this->template);
        }

        return $exception;
    }

    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    public function setTemplate($template)
    {
        $this->template = $template;

        return $this;
    }

    protected function createException()
    {
        $currentFqn = get_called_class();
        $exceptionFqn = str_replace('\\Rules\\', '\\Exceptions\\', $currentFqn);
        $exceptionFqn .= 'Exception';

        return new $exceptionFqn();
    }
}
