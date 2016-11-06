<?php

namespace Abacaphiliac\ZendPhpDotEnv\Diagnostics;

use Abacaphiliac\ZendPhpDotEnv\Options\ModuleOptionsFactory;
use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

class SuggestEnvFactory implements FactoryInterface
{
    /**
     * Create service
     *
     * @param ServiceLocatorInterface $serviceLocator
     * @return SuggestReadableFile
     * @throws \Zend\Stdlib\Exception\InvalidArgumentException
     * @throws \Zend\ServiceManager\Exception\ServiceNotFoundException
     */
    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        $files = ModuleOptionsFactory::getFiles($serviceLocator);

        return new SuggestReadableFile($files);
    }
}
