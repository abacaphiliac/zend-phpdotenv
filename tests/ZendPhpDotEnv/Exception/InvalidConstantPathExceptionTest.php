<?php

namespace AbacaphiliacTest\ZendPhpDotEnv\Exception;

use Abacaphiliac\ZendPhpDotEnv\Exception\InvalidConstantPathException;

/**
 * @covers \Abacaphiliac\ZendPhpDotEnv\Exception\InvalidConstantPathException
 */
class InvalidConstantPathExceptionTest extends \PHPUnit_Framework_TestCase
{

    public function testHierarchy()
    {
        $exception = new InvalidConstantPathException();
        self::assertInstanceOf('\Abacaphiliac\ZendPhpDotEnv\Exception\InvalidPathException', $exception);
    }
}
