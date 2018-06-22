<?php

namespace CrazyFactory\PHPUnitExtensions;

use ReflectionClass;
use ReflectionParameter;

class TestCaseHelper
{

    /**
     * @param string $class
     * @param string $method
     * @param int $paramPosition
     * @return ReflectionParameter|null
     * @throws \ReflectionException
     */
    public static function getParam(string $class, string $method, int $paramPosition): ?ReflectionParameter
    {
        return (new ReflectionClass($class))
                ->getMethod($method)
                ->getParameters()[$paramPosition]
            ?? null;
    }
}
