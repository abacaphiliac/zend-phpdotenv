<?php

namespace Abacaphiliac\ZendPhpDotEnv\Loader;

use Abacaphiliac\ZendPhpDotEnv\DotEnvFactory;

abstract class AbstractLoadEnvFiles
{
    /** @var string[] */
    private $files;

    /** @var DotEnvFactory */
    private $dotEnvFactory;

    /**
     * LoadRequiredEnvFiles constructor.
     * @param string[] $files
     * @param DotEnvFactory $dotEnvFactory
     */
    public function __construct(array $files, DotEnvFactory $dotEnvFactory = null)
    {
        $this->files = $files;
        $this->dotEnvFactory = $dotEnvFactory ?: new DotEnvFactory();
    }

    /**
     * @param string $file
     * @return boolean
     */
    abstract public function isValid($file);

    /**
     * @return mixed[]
     */
    public function __invoke()
    {
        $variables = array();

        foreach ($this->files as $file) {
            if ($this->isValid($file)) {
                $loader = $this->dotEnvFactory->createFromFile($file);
                $variables = array_merge($variables, $loader->load() ?: array()); // TODO Use variadic function.
            }
        }

        return $variables;
    }
}
