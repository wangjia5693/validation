<?php
namespace Validation;

use finfo;
use ReflectionClass;
use Validation\Exceptions\AllOfException;
use Validation\Exceptions\ComponentException;
use Validation\Exceptions\ValidationException;
use Validation\Rules\AllOf;
use Validation\Rules\Key;

class Validator extends AllOf
{
    protected static $factory;

    /**
     * @return Factory
     */
    protected static function getFactory()
    {
        if (!static::$factory instanceof Factory) {
            static::$factory = new Factory();
        }

        return static::$factory;
    }

    /**
     * @param Factory $factory
     */
    public static function setFactory($factory)
    {
        static::$factory = $factory;
    }

    /**
     * @param string $rulePrefix
     * @param bool   $prepend
     */
    public static function with($rulePrefix, $prepend = false)
    {
        if (false === $prepend) {
            self::getFactory()->appendRulePrefix($rulePrefix);
        } else {
            self::getFactory()->prependRulePrefix($rulePrefix);
        }
    }

    public function check($input)
    {
        try {
            return parent::check($input);
        } catch (ValidationException $exception) {
            if (count($this->getRules()) == 1 && $this->template) {
                $exception->setTemplate($this->template);
            }

            throw $exception;
        }
    }

    /**
     * @param string $ruleName
     * @param array  $arguments
     *
     * @return Validator
     */
    public static function __callStatic($ruleName, $arguments)
    {
        if ('allOf' === $ruleName) {
            return static::buildRule($ruleName, $arguments);
        }

        $validator = new static();

        return $validator->__call($ruleName, $arguments);
    }


    public static function buildRule($ruleSpec, $arguments = [])
    {
        try {
            return static::getFactory()->rule($ruleSpec, $arguments);
        } catch (\Exception $exception) {
            throw new ComponentException($exception->getMessage(), $exception->getCode(), $exception);
        }
    }

    /**
     * @param string $method
     * @param array  $arguments
     *
     * @return self
     */
    public function __call($method, $arguments)
    {
        return $this->addRule(static::buildRule($method, $arguments));
    }

    protected function createException()
    {
        return new AllOfException();
    }

    /**
     * Create instance validator.
     *
     * @return Validator
     */
    public static function create()
    {
        $ref = new ReflectionClass(__CLASS__);

        return $ref->newInstanceArgs(func_get_args());
    }
}
