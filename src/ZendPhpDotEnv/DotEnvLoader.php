<?php

namespace Abacaphiliac\ZendPhpDotEnv;

use Abacaphiliac\ZendPhpDotEnv\Exception\InvalidConstantPathException;
use Abacaphiliac\ZendPhpDotEnv\Exception\InvalidEnvironmentVariablePathException;
use Abacaphiliac\ZendPhpDotEnv\Exception\InvalidWorkingDirectoryPathException;
use Dotenv\Exception\InvalidPathException;
use Dotenv\Loader;

class DotEnvLoader
{
    /**
     * @param string $name
     * @return string
     */
    public static function getEnvironmentVariable($name)
    {
        $loader = new Loader(__DIR__);
        
        return $loader->getEnvironmentVariable($name);
    }
    
    /**
     * @param string $name
     * @return string
     */
    public static function hasEnvironmentVariable($name)
    {
        return (bool) self::getEnvironmentVariable($name);
    }

    /**
     * @param string $constant
     * @param string $file
     * @return mixed[]
     * @throws \Abacaphiliac\ZendPhpDotEnv\Exception\InvalidConstantPathException
     */
    public static function loadFromConstant($constant, $file)
    {
        try {
            return DotEnvFactory::createFromConstant($constant, $file)->load();
        } catch (InvalidPathException $e) {
            //
        }
    }

    /**
     * @param string $variable
     * @param string $file
     * @return mixed[]
     * @throws \Abacaphiliac\ZendPhpDotEnv\Exception\InvalidEnvironmentVariablePathException
     */
    public static function loadFromEnvironmentVariable($variable, $file)
    {
        try {
            return DotEnvFactory::createFromEnvironmentVariable($variable, $file)->load();
        } catch (InvalidPathException $e) {
            //
        }
    }

    /**
     * @param string $file
     * @return mixed[]
     * @throws \Abacaphiliac\ZendPhpDotEnv\Exception\InvalidWorkingDirectoryPathException
     */
    public static function loadFromWorkingDirectory($file)
    {
        try {
            return DotEnvFactory::createFromWorkingDirectory($file)->load();
        } catch (InvalidPathException $e) {
            //
        }
    }
}
