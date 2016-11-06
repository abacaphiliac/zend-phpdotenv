<?php

namespace Abacaphiliac\ZendPhpDotEnv\Options;

use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

class ModuleOptionsFactory implements FactoryInterface
{
    /**
     * Create service
     *
     * @param ServiceLocatorInterface $serviceLocator
     * @return ModuleOptions
     * @throws \Zend\Stdlib\Exception\InvalidArgumentException
     * @throws \Zend\ServiceManager\Exception\ServiceNotFoundException
     */
    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        $options = new ModuleOptions();

        $config = $serviceLocator->get('config');

        if (array_key_exists('abacaphiliac/zend-phpdotenv', $config)) {
            $options->setFromArray($config['abacaphiliac/zend-phpdotenv']);
        }

        return $options;
    }

    /**
     * @param ServiceLocatorInterface $serviceLocator
     * @return string[]
     * @throws \Zend\Stdlib\Exception\InvalidArgumentException
     * @throws \Zend\ServiceManager\Exception\ServiceNotFoundException
     */
    public static function getFiles(ServiceLocatorInterface $serviceLocator)
    {
        $factory = new self;

        $options = $factory->createService($serviceLocator);

        return $options->getFiles();
    }
}
