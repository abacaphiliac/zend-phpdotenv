<?php

namespace Abacaphiliac\ZendPhpDotEnv\Options;

use Zend\Stdlib\AbstractOptions;

class ModuleOptions extends AbstractOptions
{
    /** @var string[] */
    private $files = array();

    /**
     * @return string[]
     */
    public function getFiles()
    {
        return $this->files;
    }

    /**
     * @param string[] $files
     * @return void
     */
    public function setFiles(array $files)
    {
        $this->files = $files;
    }
}
