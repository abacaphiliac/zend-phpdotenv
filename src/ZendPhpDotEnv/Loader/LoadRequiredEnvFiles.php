<?php

namespace Abacaphiliac\ZendPhpDotEnv\Loader;

class LoadRequiredEnvFiles extends AbstractLoadEnvFiles
{
    /**
     * @param string $file
     * @return boolean
     */
    public function isValid($file)
    {
        // Assume file is valid and continue processing. The file processor throws meaningful exceptions.

        return true;
    }
}
