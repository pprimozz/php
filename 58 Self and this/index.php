<?php

class exampleClass
{
    public static $foo;
    public $bar;
    public function regularFunction() { echo $this->bar; }

    public static function staticFunction() { echo self::$foo; }

    public static function anotherStatFn() { self::staticFunction(); }

    public function regularFnUsingStaticVar() { echo self::$foo; }
    
    // NOTE: As of PHP 5.3 using $this::$bar instead of self::$bar is allowed

}

exampleClass::$foo = "Hello";

$obj = new exampleClass();

$obj->bar = "World!";

exampleClass::staticFunction(); /* prints Hello */

$obj->regularFunction(); /* prints World! */