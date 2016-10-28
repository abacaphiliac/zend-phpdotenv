<?php

namespace AbacaphiliacTest\ZendPhpDotEnv\Exception;

use Abacaphiliac\ZendPhpDotEnv\Exception\InvalidEnvironmentVariablePathException;

/**
 * @covers \Abacaphiliac\ZendPhpDotEnv\Exception\InvalidEnvironmentVariablePathException
 */
class InvalidEnvironmentVariablePathExceptionTest extends \PHPUnit_Framework_TestCase
{

    public function testHierarchy()
    {
        $exception = new InvalidEnvironmentVariablePathException();
        self::assertInstanceOf('\Abacaphiliac\ZendPhpDotEnv\Exception\InvalidPathException', $exception);
    }
}
