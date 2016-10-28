<?php

namespace AbacaphiliacTest\ZendPhpDotEnv\Exception;

use Abacaphiliac\ZendPhpDotEnv\Exception\InvalidWorkingDirectoryPathException;

/**
 * @covers \Abacaphiliac\ZendPhpDotEnv\Exception\InvalidWorkingDirectoryPathException
 */
class InvalidWorkingDirectoryPathExceptionTest extends \PHPUnit_Framework_TestCase
{

    public function testHierarchy()
    {
        $exception = new InvalidWorkingDirectoryPathException();
        self::assertInstanceOf('\Abacaphiliac\ZendPhpDotEnv\Exception\InvalidPathException', $exception);
    }
}
