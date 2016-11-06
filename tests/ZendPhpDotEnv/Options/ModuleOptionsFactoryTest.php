<?php

namespace AbacaphiliacTest\ZendPhpDotEnv\Options;

use Abacaphiliac\ZendPhpDotEnv\Options\ModuleOptionsFactory;
use Zend\ServiceManager\ServiceLocatorInterface;
use Zend\ServiceManager\ServiceManager;

/**
 * @covers \Abacaphiliac\ZendPhpDotEnv\Options\ModuleOptionsFactory
 */
class ModuleOptionsFactoryTest extends \PHPUnit_Framework_TestCase
{
    /** @var \ArrayObject */
    private $config;

    /** @var ServiceLocatorInterface */
    private $serviceLocator;

    /** @var ModuleOptionsFactory */
    private $sut;

    protected function setUp()
    {
        parent::setUp();

        $this->serviceLocator = new ServiceManager();
        $this->serviceLocator->setService('config', $this->config = new \ArrayObject());

        $this->sut = new ModuleOptionsFactory();
    }

    public function testCreateService()
    {
        $actual = $this->sut->createService($this->serviceLocator);

        self::assertInstanceOf('Abacaphiliac\ZendPhpDotEnv\Options\ModuleOptions', $actual);
    }

    public function testCreateServiceWithFiles()
    {
        $this->config['abacaphiliac/zend-phpdotenv'] = array(
            'files' => $expected = array(
                'relative/path/to/file',
            ),
        );

        $actual = $this->sut->createService($this->serviceLocator);

        self::assertInstanceOf('Abacaphiliac\ZendPhpDotEnv\Options\ModuleOptions', $actual);
        self::assertArraySubset($expected, $actual->getFiles());
    }

    public function testGetFiles()
    {
        $this->config['abacaphiliac/zend-phpdotenv'] = array(
            'files' => $expected = array(
                'relative/path/to/file',
            ),
        );

        self::assertArraySubset($expected, ModuleOptionsFactory::getFiles($this->serviceLocator));
    }
}
