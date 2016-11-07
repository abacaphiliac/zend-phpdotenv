<?php

namespace Abacaphiliac\ZendPhpDotEnv;

use Zend\ModuleManager\Feature\ConfigProviderInterface;
use Zend\EventManager\EventInterface;
use Zend\ModuleManager\Feature\BootstrapListenerInterface;
use Zend\Mvc\MvcEvent;

class Module implements ConfigProviderInterface, BootstrapListenerInterface
{
    /**
     * Returns configuration to merge with application configuration
     *
     * @return array|\Traversable
     */
    public function getConfig()
    {
        return require __DIR__ . '/../../config/module.config.php';
    }

    /**
     * Listen to the bootstrap event
     *
     * @param EventInterface $e
     * @return array
     * @throws \Zend\ServiceManager\Exception\ServiceNotFoundException
     */
    public function onBootstrap(EventInterface $e)
    {
        if ($e instanceof MvcEvent) {
            $application = $e->getApplication();
            $serviceLocator = $application->getServiceManager();
            $loader = $serviceLocator->get('Abacaphiliac\ZendPhpDotEnv\EnvLoader');
            if (is_callable($loader)) {
                $loader();
            }
        }
    }
}
