<?php

namespace AbacaphiliacTest\ZendPhpDotEnv\Loader;

use Abacaphiliac\ZendPhpDotEnv\DotEnvFactory;
use Abacaphiliac\ZendPhpDotEnv\Loader\LoadOptionalEnvFiles;
use Dotenv\Dotenv;
use org\bovigo\vfs\vfsStream;
use org\bovigo\vfs\vfsStreamFile;

/**
 * @covers \Abacaphiliac\ZendPhpDotEnv\Loader\LoadOptionalEnvFiles
 * @covers \Abacaphiliac\ZendPhpDotEnv\Loader\AbstractLoadEnvFiles
 */
class LoadOptionalEnvFilesTest extends \PHPUnit_Framework_TestCase
{
    /** @var vfsStreamFile */
    private $file;

    /** @var \PHPUnit_Framework_MockObject_MockObject|DotEnv */
    private $dotEnv;

    /** @var \PHPUnit_Framework_MockObject_MockObject|DotEnvFactory */
    private $dotEnvFactory;

    protected function setUp()
    {
        $root = vfsStream::setup('test');
        $this->file = vfsStream::newFile('.env');
        $root->addChild($this->file);

        $this->dotEnvFactory = $this->getMockBuilder('\Abacaphiliac\ZendPhpDotEnv\DotEnvFactory')->getMock();
        $this->dotEnv = $this->getMockBuilder('\Dotenv\Dotenv')->disableOriginalConstructor()->getMock();
    }

    public function testLoadOptionalReadableFile()
    {
        $this->dotEnvFactory->method('createFromFile')->willReturn($this->dotEnv);

        $this->dotEnv->expects(self::atLeastOnce())->method('load');

        $loader = new LoadOptionalEnvFiles(array($this->file->url()), $this->dotEnvFactory);

        $result = $loader();
        self::assertInternalType('array', $result);
    }

    public function testNotLoadOptionalNonReadableFile()
    {
        $this->file->chmod(0);

        $this->dotEnvFactory->method('createFromFile')->willReturn($this->dotEnv);

        $this->dotEnv->expects(self::never())->method('load');

        $loader = new LoadOptionalEnvFiles(array($this->file->url()), $this->dotEnvFactory);

        $result = $loader();
        self::assertInternalType('array', $result);
    }

    public function testNotLoadOptionalDirectory()
    {
        $this->dotEnvFactory->method('createFromFile')->willReturn($this->dotEnv);

        $this->dotEnv->expects(self::never())->method('load');

        $loader = new LoadOptionalEnvFiles(array(dirname($this->file->url())), $this->dotEnvFactory);

        $result = $loader();
        self::assertInternalType('array', $result);
    }
}
