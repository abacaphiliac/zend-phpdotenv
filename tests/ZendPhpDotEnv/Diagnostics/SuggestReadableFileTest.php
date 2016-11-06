<?php

namespace AbacaphiliacTest\ZendPhpDotEnv\Diagnostics;

use Abacaphiliac\ZendPhpDotEnv\Diagnostics\SuggestReadableFile;
use org\bovigo\vfs\vfsStream;
use org\bovigo\vfs\vfsStreamDirectory;
use org\bovigo\vfs\vfsStreamFile;

/**
 * @covers \Abacaphiliac\ZendPhpDotEnv\Diagnostics\SuggestReadableFile
 */
class SuggestReadableFileTest extends \PHPUnit_Framework_TestCase
{
    /** @var vfsStreamDirectory */
    private $root;

    /** @var vfsStreamFile */
    private $file;

    /** @var SuggestReadableFile */
    private $sut;

    protected function setUp()
    {
        parent::setUp();

        $this->root = vfsStream::setup('test');
        $this->file = vfsStream::newFile('.env');
        $this->root->addChild($this->file);

        $this->sut = new SuggestReadableFile(array(
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
        $sut = new SuggestReadableFile(array(
            $this->root->url(),
        ));
        $result = $sut->check();
        self::assertInstanceOf('\ZendDiagnostics\Result\WarningInterface', $result);
    }

    public function testNonReadableFileIsInvalid()
    {
        $this->file->chmod(0);
        $result = $this->sut->check();
        self::assertInstanceOf('\ZendDiagnostics\Result\WarningInterface', $result);
    }

    public function testNonExistentFileIsInvalid()
    {
        self::assertFileExists($this->file->url());
        unlink($this->file->url());
        self::assertFileNotExists($this->file->url());

        $result = $this->sut->check();
        self::assertInstanceOf('\ZendDiagnostics\Result\WarningInterface', $result);
    }
}
