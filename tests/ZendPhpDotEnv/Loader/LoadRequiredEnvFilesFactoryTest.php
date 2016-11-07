<?php

namespace AbacaphiliacTest\ZendPhpDotEnv\Options;

use Abacaphiliac\ZendPhpDotEnv\Loader\LoadRequiredEnvFilesFactory;
use Zend\ServiceManager\ServiceLocatorInterface;
use Zend\ServiceManager\ServiceManager;

/**
 * @covers \Abacaphiliac\ZendPhpDotEnv\Loader\LoadRequiredEnvFilesFactory
 */
class LoadRequiredEnvFilesFactoryTest extends \PHPUnit_Framework_TestCase
{
    /** @var \ArrayObject */
    private $config;

    /** @var ServiceLocatorInterface */
    private $serviceLocator;

    /** @var LoadRequiredEnvFilesFactory */
    private $sut;

    protected function setUp()
    {
        parent::setUp();

        $this->serviceLocator = new ServiceManager();
        $this->serviceLocator->setService('config', $this->config = new \ArrayObject());

        $this->sut = new LoadRequiredEnvFilesFactory();
    }

    public function testCreateService()
    {
        $actual = $this->sut->createService($this->serviceLocator);

        self::assertInstanceOf('Abacaphiliac\ZendPhpDotEnv\Loader\LoadRequiredEnvFiles', $actual);
    }
}
