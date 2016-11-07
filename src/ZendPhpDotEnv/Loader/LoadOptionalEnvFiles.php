<?php

namespace Abacaphiliac\ZendPhpDotEnv\Loader;

class LoadOptionalEnvFiles extends AbstractLoadEnvFiles
{
    /**
     * @param string $file
     * @return boolean
     */
    public function isValid($file)
    {
        if (!is_file($file)) {
            return false;
        }

        if (!is_readable($file)) {
            return false;
        }

        return true;
    }
}
