<?php

namespace Abacaphiliac\ZendPhpDotEnv;

use Dotenv\Dotenv;

class DotEnvFactory
{
    /**
     * @param string $name
     * @param string $file
     * @return Dotenv
     */
    public static function createFromConstant($name, $file)
    {
        $path = constant($name);

        return self::create($path, $file);
    }

    /**
     * @param string $name
     * @param string $file
     * @return Dotenv
     */
    public static function createFromEnvironmentVariable($name, $file)
    {
        $path = DotEnvLoader::getEnvironmentVariable($name);

        return self::create($path, $file);
    }

    /**
     * @param string $file
     * @return Dotenv
     */
    public static function createFromWorkingDirectory($file)
    {
        $path = getcwd();

        return self::create($path, $file);
    }

    /**
     * @param string $path
     * @param string $file
     * @return Dotenv
     */
    public static function create($path, $file)
    {
        return new Dotenv($path, $file);
    }
}
