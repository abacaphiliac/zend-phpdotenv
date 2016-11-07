<?php

namespace AbacaphiliacTest\ZendPhpDotEnv;

use Abacaphiliac\ZendPhpDotEnv\Module;
use Zend\EventManager\EventManager;
use Zend\Http\PhpEnvironment\Request;
use Zend\Http\PhpEnvironment\Response;
use Zend\Mvc\Application;
use Zend\Mvc\MvcEvent;
use Zend\ServiceManager\ServiceManager;

/**
 * @covers \Abacaphiliac\ZendPhpDotEnv\Module
 */
class ModuleTest extends \PHPUnit_Framework_TestCase
{
    /** @var Module */
    private $sut;

    protected function setUp()
    {
        $this->sut = new Module();
    }

    public function testGetConfig()
    {
        $config = $this->sut->getConfig();
        self::assertArraySubset($config, unserialize(serialize($config)));
    }

    public function testOnBootstrap()
    {
        $event = new MvcEvent();
        $event->setApplication(new Application(
            array(),
            $serviceLocator = new ServiceManager(),
            new EventManager(),
            new Request(),
            new Response()
        ));

        $wasCalled = false;

        $serviceLocator->setService('Abacaphiliac\ZendPhpDotEnv\EnvLoader', function () use (&$wasCalled) {
            $wasCalled = true;
        });

        $this->sut->onBootstrap($event);

        self::assertTrue($wasCalled);
    }
}
