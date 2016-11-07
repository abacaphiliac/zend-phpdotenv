<?php

namespace AbacaphiliacTest\ZendPhpDotEnv\Options;

use Abacaphiliac\ZendPhpDotEnv\Loader\LoadOptionalEnvFilesFactory;
use Zend\ServiceManager\ServiceLocatorInterface;
use Zend\ServiceManager\ServiceManager;

/**
 * @covers \Abacaphiliac\ZendPhpDotEnv\Loader\LoadOptionalEnvFilesFactory
 */
class LoadOptionalEnvFilesFactoryTest extends \PHPUnit_Framework_TestCase
{
    /** @var \ArrayObject */
    private $config;

    /** @var ServiceLocatorInterface */
    private $serviceLocator;

    /** @var LoadOptionalEnvFilesFactory */
    private $sut;

    protected function setUp()
    {
        parent::setUp();

        $this->serviceLocator = new ServiceManager();
        $this->serviceLocator->setService('config', $this->config = new \ArrayObject());

        $this->sut = new LoadOptionalEnvFilesFactory();
    }

    public function testCreateService()
    {
        $actual = $this->sut->createService($this->serviceLocator);

        self::assertInstanceOf('Abacaphiliac\ZendPhpDotEnv\Loader\LoadOptionalEnvFiles', $actual);
    }
}
