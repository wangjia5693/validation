<?php
namespace Validation;
use Validation\Exceptions\NestedValidationException;


class ValidateMiddleware
{
    /**
     * Validators.
     *
     * @var array
     */
    protected $validators = [];
    /**
     * The translator to use fro the exception message.
     *
     * @var callable
     */
    protected $translator = null;
    /**
     * Errors from the validation.
     *
     * @var array
     */
    protected $errors = [];
    /**
     * The 'errors' attribute name.
     *
     * @var string
     */
    protected $errors_name = 'errors';
    /**
     * The 'has_error' attribute name.
     *
     * @var string
     */
    protected $has_errors_name = 'has_errors';
    /**
     * The 'validators' attribute name.
     *
     * @var string
     */
    protected $validators_name = 'validators';
    /**
     * The 'translator' attribute name.
     *
     * @var string
     */
    protected $translator_name = 'translator';
    /**
     * Create new Validator service provider.
     *
     * @param null|array|ArrayAccess $validators
     * @param null|callable          $translator
     */
    public function __construct($validators = null, $translator = null)
    {
        // Set the validators
        if (is_array($validators) || $validators instanceof \ArrayAccess) {
            $this->validators = $validators;
        } elseif (is_null($validators)) {
            $this->validators = [];
        }
        $this->translator = $translator;
    }


    public function __invoke($request, $next)
    {
        $this->errors = [];
        $this->validate($request, $this->validators);
        #将验证信息赋值给变量
//        $request = $request->withAttribute($this->errors_name, $this->getErrors());
//        $request = $request->withAttribute($this->has_errors_name, $this->hasErrors());
//        $request = $request->withAttribute($this->validators_name, $this->getValidators());
//        $request = $request->withAttribute($this->translator_name, $this->getTranslator());
        return $next($request);
    }
    /**
     * 验证
     * @param array $params     需要被验证的数据
     * @param array $validators 验证规则
     */
    private function validate($params = [], $validators = [], $actualKeys = [])
    {
        //Validate every parameters in the validators array
        foreach ($validators as $key => $validator) {
            $actualKeys[] = $key;
            $param = $this->getNestedParam($params, $actualKeys);
            if (is_array($validator)) {
                $this->validate($params, $validator, $actualKeys);
            } else {
                try {
                    $validator->assert($param);
                } catch (NestedValidationException $exception) {
                    if ($this->translator) {
                        $exception->setParam('translator', $this->translator);
                    }
                    $this->errors[implode('.', $actualKeys)] = $exception->getMessages();
                }
            }

            array_pop($actualKeys);
        }
    }
    /**
     * Get the nested parameter value.
     *
     * @param array $params An array that represents the values of the parameters.
     * @param array $keys   An array that represents the tree of keys to use.
     *
     * @return mixed The nested parameter value by the given params and tree of keys.
     */
    private function getNestedParam($params = [], $keys = [])
    {
        if (empty($keys)) {
            return $params;
        } else {
            $firstKey = array_shift($keys);
            if (array_key_exists($firstKey, $params)) {
                $params = (array) $params;
                $paramValue = $params[$firstKey];
                return $this->getNestedParam($paramValue, $keys);
            } else {
                return;
            }
        }
    }
    /**
     * 是否通过验证
     */
    public function hasErrors()
    {
        return !empty($this->errors);
    }
    /**
     * 获取错误信息
     */
    public function getErrors()
    {
        return $this->errors;
    }
    /**
     * 获取过滤验证规则
     */
    public function getValidators()
    {
        return $this->validators;
    }
    /**
     *设置过滤验证规则
     */
    public function setValidators($validators)
    {
        $this->validators = $validators;
    }
    /**
     *获取当前的提示说明
     */
    public function getTranslator()
    {
        return $this->translator;
    }
    /**
     *替换原有的提示说明；匿名函数
     * @param callable $translator The translator.
     */
    public function setTranslator($translator)
    {
        $this->translator = $translator;
    }
}