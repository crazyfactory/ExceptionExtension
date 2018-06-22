<?php

namespace CrazyFactory\MagicModels\Test;

use CrazyFactory\PHPUnitExtensions\CrazyTestCase;
use CrazyFactory\PHPUnitExtensions\TestCaseHelper;

class CrazyTestCaseTest extends CrazyTestCase
{

    public function testAssertExceptionThrown()
    {
        $this->assertExceptionThrown(function () {
            throw new \Exception();
        }, \Exception::class);

        $this->assertTrue(true);
    }

    private static function getFunc(string $method)
    {
        return TestCaseHelper::getParam(
            self::class,
            $method,
            0
        );
    }

    private static function fn1(int $int)
    {
    }

    public function testAssertParamIsOfType()
    {
        $param = self::getFunc('fn1');

        $this->assertParamIsOfType($param, 'int');
    }

    private static function fn2(?int $int)
    {
    }

    public function testAssertParamIsNullable()
    {
        $param = self::getFunc('fn2');

        $this->assertParamIsNullable($param);
    }

    private static function fn3(int $int)
    {
    }

    public function testAssertParamIsNotNullable()
    {
        $param = self::getFunc('fn3');

        $this->assertParamIsNotNullable($param);
    }

    private static function fn4($int = 0)
    {
    }

    public function testAssertParamIsOptional()
    {
        $param = self::getFunc('fn4');

        $this->assertParamIsOptional($param);
    }

    private static function fn5($int)
    {
    }

    public function testAssertParamIsNotOptional()
    {
        $param = self::getFunc('fn5');

        $this->assertParamIsNotOptional($param);
    }
}
