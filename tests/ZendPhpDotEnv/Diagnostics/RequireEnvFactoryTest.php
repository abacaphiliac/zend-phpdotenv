<?php

namespace AbacaphiliacTest\ZendPhpDotEnv\Diagnostics;

use Abacaphiliac\ZendPhpDotEnv\Diagnostics\RequireEnvFactory;
use Zend\ServiceManager\ServiceManager;

/**
 * @covers \Abacaphiliac\ZendPhpDotEnv\Diagnostics\RequireEnvFactory
 */
class RequireEnvFactoryTest extends \PHPUnit_Framework_TestCase
{
    /** @var \ArrayObject */
    private $config;

    /** @var RequireEnvFactory */
    private $sut;

    /** @var ServiceManager */
    private $serviceLocator;

    protected function setUp()
    {
        parent::setUp();

        $this->serviceLocator = new ServiceManager();
        $this->serviceLocator->setService('config', $this->config = new \ArrayObject());

        $this->sut = new RequireEnvFactory();
    }

    public function testCreateService()
    {
        $service = $this->sut->createService($this->serviceLocator);
        self::assertInstanceOf('\Abacaphiliac\ZendPhpDotEnv\Diagnostics\RequireReadableFile', $service);
    }
}
