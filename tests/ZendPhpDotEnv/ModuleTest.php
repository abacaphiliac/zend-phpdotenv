<?php

namespace AbacaphiliacTest\ZendPhpDotEnv;

use Abacaphiliac\ZendPhpDotEnv\DotEnvLoader;
use Abacaphiliac\ZendPhpDotEnv\Module;
use Zend\EventManager\SharedEventManager;
use Zend\Mvc\Service\EventManagerFactory;
use Zend\Mvc\Service\ModuleManagerFactory;
use Zend\ServiceManager\ServiceManager;

class ModuleTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @expectedException \Abacaphiliac\ZendPhpDotEnv\Exception\InvalidConstantPathException
     */
    public function testModuleLoadsEnvironmentVariablesFromConstant()
    {
        self::assertFalse(defined(__FUNCTION__));
        define(__FUNCTION__, __DIR__);
        
        $module = new Module($constant = __FUNCTION__, $variable = null, $file = '.testEnv');
        $module->loadEnvironmentVariables();
    }

    /**
     * @expectedException \Abacaphiliac\ZendPhpDotEnv\Exception\InvalidEnvironmentVariablePathException
     */
    public function testModuleLoadsEnvironmentVariablesFromEnvironmentVariable()
    {
        self::assertFalse(DotEnvLoader::hasEnvironmentVariable(__FUNCTION__));
        $_ENV[__FUNCTION__] = __DIR__;
        
        $module = new Module($constant = null, $variable = __FUNCTION__, $file = '.testEnv');
        $module->loadEnvironmentVariables();
    }

    /**
     * @expectedException \Abacaphiliac\ZendPhpDotEnv\Exception\InvalidWorkingDirectoryPathException
     */
    public function testModuleLoadsEnvironmentVariablesFromWorkingDirectory()
    {
        $module = new Module($constant = null, $variable = null, $file = '.testEnv');
        $module->loadEnvironmentVariables();
    }

    /**
     * @expectedException \Dotenv\Exception\InvalidPathException
     */
    public function testLoadModule()
    {
        $serviceLocator = new ServiceManager();
        $serviceLocator->setService('ApplicationConfig', array(
            'module_listener_options' => array(),
            'modules' => array(
                'Abacaphiliac\ZendPhpDotEnv',
            ),
        ));
        $serviceLocator->setFactory('EventManager', new EventManagerFactory());
        $serviceLocator->setService('SharedEventManager', new SharedEventManager());
        $serviceLocator->setFactory('ServiceListener', '\Zend\Mvc\Service\ServiceListenerFactory');
        
        $moduleManagerFactory = new ModuleManagerFactory();
        $moduleManager = $moduleManagerFactory->createService($serviceLocator);
        
        $moduleManager->loadModules();
    }
}
