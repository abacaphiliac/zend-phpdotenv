<?php

namespace AbacaphiliacTest\ZendPhpDotEnv\Options;

use Abacaphiliac\ZendPhpDotEnv\Options\ModuleOptions;

/**
 * @covers \Abacaphiliac\ZendPhpDotEnv\Options\ModuleOptions
 */
class ModuleOptionsTest extends \PHPUnit_Framework_TestCase
{
    /** @var ModuleOptions */
    private $sut;

    protected function setUp()
    {
        parent::setUp();

        $this->sut = new ModuleOptions();
    }

    public function testFiles()
    {
        self::assertCount(0, $this->sut->getFiles());

        $this->sut->setFromArray(array(
            'files' => $expected = array(
                'relative/path/to/file',
            ),
        ));

        self::assertArraySubset($expected, $this->sut->getFiles());
    }
}
