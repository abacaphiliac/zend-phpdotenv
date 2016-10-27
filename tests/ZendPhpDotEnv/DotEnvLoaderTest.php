<?php

namespace AbacaphiliacTest\ZendPhpDotEnv;

use Abacaphiliac\ZendPhpDotEnv\DotEnvLoader;

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
}
