<?php

namespace Abacaphiliac\ZendPhpDotEnv\Diagnostics;

use ZendDiagnostics\Check\AbstractFileCheck;
use ZendDiagnostics\Result\ResultInterface;
use ZendDiagnostics\Result\Success;

class RequireReadableFile extends AbstractFileCheck
{
    /**
     * Validates a specific file type and returns a check result
     *
     * @param string $file
     * @return ResultInterface
     */
    protected function validateFile($file)
    {
        // This is an optional secondary validation. The parent validates existence of the file.

        return new Success();
    }
}
