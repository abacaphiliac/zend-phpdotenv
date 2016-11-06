<?php

namespace AbacaphiliacTest\ZendPhpDotEnv\Exception;

use Abacaphiliac\ZendPhpDotEnv\Exception\InvalidPathException;

/**
 * @covers \Abacaphiliac\ZendPhpDotEnv\Exception\InvalidPathException
 */
class InvalidPathExceptionTest extends \PHPUnit_Framework_TestCase
{

    public function testHierarchy()
    {
        $exception = new InvalidPathException();
        self::assertInstanceOf('\Dotenv\Exception\InvalidPathException', $exception);
        self::assertInstanceOf('\Abacaphiliac\ZendPhpDotEnv\Exception\ExceptionInterface', $exception);
    }
}
