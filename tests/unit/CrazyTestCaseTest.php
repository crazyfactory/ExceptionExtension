<?php

namespace CrazyFactory\PHPUnitExtensions\Tests;

use CrazyFactory\PHPUnitExtensions\CrazyTestCase;
use CrazyFactory\PHPUnitExtensions\TestCaseHelper;

class CrazyTestCaseTest extends CrazyTestCase
{

    public function testAssertExceptionThrown()
    {
        $this->assertExceptionThrown(function () {
            throw new \Exception();
        }, \Exception::class);
    }

    private static function fn1(int $int)
    {
    }

    private static function fn2(?int $int)
    {
    }

    private static function fn3($int = 0)
    {
    }

    private static function getFunc(string $method)
    {
        return TestCaseHelper::getParam(
            self::class,
            $method,
            0
        );
    }

    public function testAssertParamIsOfType()
    {
        $param = self::getFunc('fn1');

        $this->assertParamIsOfType($param, 'int');
    }

    public function testAssertParamIsNullable()
    {
        $param = self::getFunc('fn2');

        $this->assertParamIsNullable($param);
    }

    public function testAssertParamIsNotNullable()
    {
        $param = self::getFunc('fn1');

        $this->assertParamIsNotNullable($param);
    }

    public function testAssertParamIsOptional()
    {
        $param = self::getFunc('fn3');

        $this->assertParamIsOptional($param);
    }

    public function testAssertParamIsNotOptional()
    {
        $param = self::getFunc('fn1');

        $this->assertParamIsNotOptional($param);
    }
}
