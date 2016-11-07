<?php

namespace AbacaphiliacTest\ZendPhpDotEnv\Loader;

use Abacaphiliac\ZendPhpDotEnv\Loader\LoadRequiredEnvFiles;
use org\bovigo\vfs\vfsStream;
use org\bovigo\vfs\vfsStreamFile;

/**
 * @covers \Abacaphiliac\ZendPhpDotEnv\Loader\LoadRequiredEnvFiles
 * @covers \Abacaphiliac\ZendPhpDotEnv\Loader\AbstractLoadEnvFiles
 */
class LoadRequiredEnvFilesTest extends \PHPUnit_Framework_TestCase
{
    /** @var vfsStreamFile */
    private $file;

    protected function setUp()
    {
        $root = vfsStream::setup('test');
        $this->file = vfsStream::newFile('.env');
        $root->addChild($this->file);
    }

    public function testLoadRequiredReadableFile()
    {
        $loader = new LoadRequiredEnvFiles(array($this->file->url()));

        $result = $loader();
        self::assertInternalType('array', $result);
    }

    /**
     * @expectedException \Dotenv\Exception\ExceptionInterface
     */
    public function testLoadRequiredNonReadableFile()
    {
        $this->file->chmod(0);

        $loader = new LoadRequiredEnvFiles(array($this->file->url()));
        $loader();
    }

    /**
     * @expectedException \Dotenv\Exception\ExceptionInterface
     */
    public function testLoadRequiredDirectory()
    {
        $loader = new LoadRequiredEnvFiles(array(dirname($this->file->url())));
        $loader();
    }
}
