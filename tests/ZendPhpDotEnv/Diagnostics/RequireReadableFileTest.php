<?php

namespace AbacaphiliacTest\ZendPhpDotEnv\Diagnostics;

use Abacaphiliac\ZendPhpDotEnv\Diagnostics\RequireReadableFile;
use org\bovigo\vfs\vfsStream;
use org\bovigo\vfs\vfsStreamDirectory;
use org\bovigo\vfs\vfsStreamFile;

/**
 * @covers \Abacaphiliac\ZendPhpDotEnv\Diagnostics\RequireReadableFile
 */
class RequireReadableFileTest extends \PHPUnit_Framework_TestCase
{
    /** @var vfsStreamDirectory */
    private $root;

    /** @var vfsStreamFile */
    private $file;

    /** @var RequireReadableFile */
    private $sut;

    protected function setUp()
    {
        parent::setUp();

        $this->root = vfsStream::setup('test');
        $this->file = vfsStream::newFile('.env');
        $this->root->addChild($this->file);

        $this->sut = new RequireReadableFile(array(
            $this->file->url(),
        ));
    }

    public function testReadableFileIsValid()
    {
        $this->file->chmod(777);
        $result = $this->sut->check();
        self::assertInstanceOf('\ZendDiagnostics\Result\SuccessInterface', $result);
    }

    public function testDirectoryIsInvalid()
    {
        $sut = new RequireReadableFile(array(
            $this->root->url(),
        ));
        $result = $sut->check();
        self::assertInstanceOf('\ZendDiagnostics\Result\FailureInterface', $result);
    }

    public function testNonReadableFileIsInvalid()
    {
        $this->file->chmod(0);
        $result = $this->sut->check();
        self::assertInstanceOf('\ZendDiagnostics\Result\FailureInterface', $result);
    }
}
