<?php

namespace Abacaphiliac\ZendPhpDotEnv\Loader;

use Abacaphiliac\ZendPhpDotEnv\Options\ModuleOptionsFactory;
use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

class LoadOptionalEnvFilesFactory implements FactoryInterface
{
    /**
     * Create service
     *
     * @param ServiceLocatorInterface $serviceLocator
     * @return LoadOptionalEnvFiles
     * @throws \Zend\Stdlib\Exception\InvalidArgumentException
     * @throws \Zend\ServiceManager\Exception\ServiceNotFoundException
     */
    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        $files = ModuleOptionsFactory::getFiles($serviceLocator);

        return new LoadOptionalEnvFiles($files);
    }
}
