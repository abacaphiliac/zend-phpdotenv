<?php

namespace AbacaphiliacTest\ZendPhpDotEnv;

use Abacaphiliac\ZendPhpDotEnv\DotEnvLoader;

/**
 * @covers \Abacaphiliac\ZendPhpDotEnv\DotEnvLoader
 */
class DotEnvLoaderTest extends \PHPUnit_Framework_TestCase
{
    public function testGetEnvironmentVariable()
    {
        self::assertFalse(array_key_exists(__METHOD__, $_ENV));
        
        $_ENV[__METHOD__] = $expected = __METHOD__;
        
        $actual = DotEnvLoader::getEnvironmentVariable(__METHOD__);

        unset($_ENV[__METHOD__]);
        
        self::assertEquals($expected, $actual);
    }
    
    public function testHasEnvironmentVariable()
    {
        $actual = DotEnvLoader::hasEnvironmentVariable(__METHOD__);
        
        self::assertFalse($actual);
        
        $_ENV[__METHOD__] = $expected = __METHOD__;
        
        $actual = DotEnvLoader::hasEnvironmentVariable(__METHOD__);

        unset($_ENV[__METHOD__]);
        
        self::assertTrue($actual);
    }
    
    /**
     * @expectedException \Abacaphiliac\ZendPhpDotEnv\Exception\InvalidConstantPathException
     */
    public function testLoadEnvironmentVariablesFromConstant()
    {
        self::assertFalse(defined(__FUNCTION__));
        define(__FUNCTION__, __DIR__);

        DotEnvLoader::loadFromConstant(__FUNCTION__, '.testEnv');
    }

    /**
     * @expectedException \Abacaphiliac\ZendPhpDotEnv\Exception\InvalidEnvironmentVariablePathException
     */
    public function testLoadEnvironmentVariablesFromEnvironmentVariable()
    {
        self::assertFalse(DotEnvLoader::hasEnvironmentVariable(__FUNCTION__));
        $_ENV[__FUNCTION__] = __DIR__;

        DotEnvLoader::loadFromEnvironmentVariable(__FUNCTION__, '.testEnv');
    }

    /**
     * @expectedException \Abacaphiliac\ZendPhpDotEnv\Exception\InvalidWorkingDirectoryPathException
     */
    public function testLoadEnvironmentVariablesFromWorkingDirectory()
    {
        DotEnvLoader::loadFromWorkingDirectory($file = '.testEnv');
    }
}
