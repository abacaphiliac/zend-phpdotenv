<?php

namespace AbacaphiliacTest\ZendPhpDotEnv\Diagnostics;

use Abacaphiliac\ZendPhpDotEnv\Diagnostics\SuggestEnvFactory;
use Zend\ServiceManager\ServiceManager;

/**
 * @covers \Abacaphiliac\ZendPhpDotEnv\Diagnostics\SuggestEnvFactory
 */
class SuggestEnvFactoryTest extends \PHPUnit_Framework_TestCase
{
    /** @var \ArrayObject */
    private $config;

    /** @var SuggestEnvFactory */
    private $sut;

    /** @var ServiceManager */
    private $serviceLocator;

    protected function setUp()
    {
        parent::setUp();

        $this->serviceLocator = new ServiceManager();
        $this->serviceLocator->setService('config', $this->config = new \ArrayObject());

        $this->sut = new SuggestEnvFactory();
    }

    public function testCreateService()
    {
        $service = $this->sut->createService($this->serviceLocator);
        self::assertInstanceOf('\Abacaphiliac\ZendPhpDotEnv\Diagnostics\SuggestReadableFile', $service);
    }
}
