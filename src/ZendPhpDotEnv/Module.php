<?php

namespace Abacaphiliac\ZendPhpDotEnv;

use Zend\ModuleManager\ModuleEvent;
use Zend\ModuleManager\ModuleManager;

class Module
{
    /** @var  string */
    private $constant = 'APPLICATION_PATH';

    /** @var  string */
    private $variable = 'APPLICATION_PATH';
    
    /** @var  string */
    private $file = '.env';

    /**
     * Module constructor.
     * @param string $constant
     * @param string $variable
     * @param string $file
     */
    public function __construct($constant = null, $variable = null, $file = null)
    {
        if ($constant) {
            $this->constant = $constant;
        }

        if ($variable) {
            $this->variable = $variable;
        }

        if ($file) {
            $this->file = $file;
        }
    }

    /**
     * @param ModuleManager $moduleManager
     */
    public function init(ModuleManager $moduleManager)
    {
        $events = $moduleManager->getEventManager();

        $events->attach(ModuleEvent::EVENT_LOAD_MODULE, array($this, 'loadEnvironmentVariables'), -1);
    }

    /**
     * @return mixed[]
     * @throws \Abacaphiliac\ZendPhpDotEnv\Exception\InvalidConstantPathException
     * @throws \Abacaphiliac\ZendPhpDotEnv\Exception\InvalidEnvironmentVariablePathException
     * @throws \Abacaphiliac\ZendPhpDotEnv\Exception\InvalidWorkingDirectoryPathException
     */
    public function loadEnvironmentVariables()
    {
        // Load from application-path defined by constant.
        if ($this->constant && defined($this->constant)) {
            return DotEnvLoader::loadFromConstant($this->constant, $this->file);
        }

        // Load from application-path defined by environment-variable.
        if ($this->variable && DotEnvLoader::hasEnvironmentVariable($this->variable)) {
            return DotEnvLoader::loadFromEnvironmentVariable($this->variable, $this->file);
        }
        
        // Load from working directory. ZF2 applications change the working directory to the application root.
        return DotEnvLoader::loadFromWorkingDirectory($this->file);
    }
}
