<?php

namespace Abacaphiliac\ZendPhpDotEnv\Diagnostics;

use ZendDiagnostics\Result\FailureInterface;
use ZendDiagnostics\Result\ResultInterface;
use ZendDiagnostics\Result\Warning;

class SuggestReadableFile extends RequireReadableFile
{
    /**
     * @return ResultInterface
     */
    public function check()
    {
        $result = parent::check();

        if ($result instanceof FailureInterface) {
            return new Warning($result->getMessage(), $result->getData());
        }

        return $result;
    }
}
