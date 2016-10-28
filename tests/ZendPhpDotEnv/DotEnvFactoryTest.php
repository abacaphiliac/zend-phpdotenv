<?php

namespace AbacaphiliacTest\ZendPhpDotEnv;

use Abacaphiliac\ZendPhpDotEnv\DotEnvFactory;

/**
 * @covers \Abacaphiliac\ZendPhpDotEnv\DotEnvFactory
 */
class DotEnvFactoryTest extends \PHPUnit_Framework_TestCase
{
    public function testCreate()
    {
        $actual = DotEnvFactory::create(__DIR__, '.testEnv');
        
        self::assertInstanceOf('\Dotenv\Dotenv', $actual);
    }
    
    public function testCreateFromConstant()
    {
        $constant = 'AbacaphiliacTest_ZendPhpDotEnv_DotEnvFactoryTest_testCreateFromConstant';
        
        self::assertFalse(defined($constant));
        
        define($constant, __DIR__);
        
        $actual = DotEnvFactory::createFromConstant($constant, '.testEnv');
        
        self::assertInstanceOf('\Dotenv\Dotenv', $actual);
    }
    
    public function testCreateFromEnvironmentVariable()
    {
        self::assertFalse(array_key_exists(__METHOD__, $_ENV));
        
        $_ENV[__METHOD__] = __DIR__;
        
        $actual = DotEnvFactory::createFromEnvironmentVariable(__METHOD__, '.testEnv');
        
        unset($_ENV[__METHOD__]);
        
        self::assertInstanceOf('\Dotenv\Dotenv', $actual);
    }
    
    public function testCreateFromWorkingDirectory()
    {
        $actual = DotEnvFactory::createFromWorkingDirectory('.testEnv');
        
        unset($_ENV[__METHOD__]);
        
        self::assertInstanceOf('\Dotenv\Dotenv', $actual);
    }
}
