<?php

namespace CrazyFactory\PHPUnitExtensions;

use PHPUnit\Framework\Constraint\IsFalse;
use PHPUnit\Framework\Constraint\IsInstanceOf;
use PHPUnit\Framework\Constraint\IsTrue;
use PHPUnit\Framework\TestCase;
use ReflectionParameter;

abstract class CrazyTestCase extends TestCase
{

    /**
     * @param $fn
     * @param $exceptionClass
     * @param string|null $message
     */
    protected function assertExceptionThrown($fn, $exceptionClass, ?string $message = null)
    {
        try {
            $fn();
        }
        catch (\Throwable $t) {
        }

        $this->assertThat(
            $t ?? null,
            new IsInstanceOf($exceptionClass),
            $message ?? 'Should have thrown ' . $exceptionClass
        );
    }

    /**
     * @param ReflectionParameter $param
     * @param string $type
     * @param string|null $message
     */
    protected function assertParamIsOfType(ReflectionParameter $param, string $type, ?string $message = null)
    {
        $this->assertThat(
            (string) $param->getType() === $type,
            new IsTrue(),
            $message ?? "Argument {$param->getName()} should be of type {$type}"
        );
    }

    /**
     * @param ReflectionParameter $param
     * @param null|string $message
     */
    protected function assertParamIsNullable(ReflectionParameter $param, ?string $message = null)
    {
        $this->assertThat(
            $param->allowsNull(),
            new IsTrue(),
            $message ?? "Argument {$param->getName()} should be nullable"
        );
    }

    /**
     * @param ReflectionParameter $param
     * @param null|string $message
     */
    protected function assertParamIsNotNullable(ReflectionParameter $param, ?string $message = null)
    {
        $this->assertThat(
            $param->allowsNull(),
            new IsFalse(),
            $message ?? "Argument {$param->getName()} should not be nullable"
        );
    }

    /**
     * @param ReflectionParameter $param
     * @param null|string $message
     */
    protected function assertParamIsOptional(ReflectionParameter $param, ?string $message = null)
    {
        $this->assertThat(
            $param->isOptional(),
            new IsTrue(),
            $message ?? "Argument {$param->getName()} should be optional"
        );
    }

    /**
     * @param ReflectionParameter $param
     * @param null|string $message
     */
    protected function assertParamIsNotOptional(ReflectionParameter $param, ?string $message = null)
    {
        $this->assertThat(
            $param->isOptional(),
            new IsFalse(),
            $message ?? "Argument {$param->getName()} should not be optional"
        );
    }
}
