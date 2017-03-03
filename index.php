<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/3/3
 * Time: 8:56
 */
spl_autoload_register(function($classname){
    require_once __DIR__."/src/".$classname.'.php';
});
use Validation\Validator as v;

$a = v::optional(v::alpha())->validate('');; // false
$b = v::alpha()->validate(null); // false

$usernameValidator = v::alnum()->noWhitespace()->length(1, 15);
$c = $usernameValidator->validate('alganet'); // true
var_dump($a);
var_dump($b);
var_dump($c);