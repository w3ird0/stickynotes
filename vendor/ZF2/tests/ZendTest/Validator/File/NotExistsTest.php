<?php
/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      http://github.com/zendframework/zf2 for the canonical source repository
 * @copyright Copyright (c) 2005-2013 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 * @package   Zend_Validator
 */

namespace ZendTest\Validator\File;

use Zend\Validator\File;

/**
 * NotExists testbed
 *
 * @category   Zend
 * @package    Zend_Validator_File
 * @subpackage UnitTests
 * @group      Zend_Validator
 */
class NotExistsTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @return array
     */
    public function basicBehaviorDataProvider()
    {
        $testFile = __DIR__ . '/_files/testsize.mo';
        $baseDir  = dirname($testFile);
        $baseName = basename($testFile);
        $fileUpload = array(
            'tmp_name' => $testFile, 'name' => basename($testFile),
            'size' => 200, 'error' => 0, 'type' => 'text'
        );
        return array(
            //    Options, isValid Param, Expected value
            array(dirname($baseDir), $baseName,   true),
            array($baseDir,          $baseName,   false),
            array($baseDir,          $testFile,   false),
            array(dirname($baseDir), $fileUpload, true),
            array($baseDir,          $fileUpload, false),
        );
    }

    /**
     * Ensures that the validator follows expected behavior
     *
     * @dataProvider basicBehaviorDataProvider
     * @return void
     */
    public function testBasic($options, $isValidParam, $expected)
    {
        $validator = new File\NotExists($options);
        $this->assertEquals($expected, $validator->isValid($isValidParam));
    }

    /**
     * Ensures that getDirectory() returns expected value
     *
     * @return void
     */
    public function testGetDirectory()
    {
        $validator = new File\NotExists('C:/temp');
        $this->assertEquals('C:/temp', $validator->getDirectory());

        $validator = new File\NotExists(array('temp', 'dir', 'jpg'));
        $this->assertEquals('temp,dir,jpg', $validator->getDirectory());

        $validator = new File\NotExists(array('temp', 'dir', 'jpg'));
        $this->assertEquals(array('temp', 'dir', 'jpg'), $validator->getDirectory(true));
    }

    /**
     * Ensures that setDirectory() returns expected value
     *
     * @return void
     */
    public function testSetDirectory()
    {
        $validator = new File\NotExists('temp');
        $validator->setDirectory('gif');
        $this->assertEquals('gif', $validator->getDirectory());
        $this->assertEquals(array('gif'), $validator->getDirectory(true));

        $validator->setDirectory('jpg, temp');
        $this->assertEquals('jpg,temp', $validator->getDirectory());
        $this->assertEquals(array('jpg', 'temp'), $validator->getDirectory(true));

        $validator->setDirectory(array('zip', 'ti'));
        $this->assertEquals('zip,ti', $validator->getDirectory());
        $this->assertEquals(array('zip', 'ti'), $validator->getDirectory(true));
    }

    /**
     * Ensures that addDirectory() returns expected value
     *
     * @return void
     */
    public function testAddDirectory()
    {
        $validator = new File\NotExists('temp');
        $validator->addDirectory('gif');
        $this->assertEquals('temp,gif', $validator->getDirectory());
        $this->assertEquals(array('temp', 'gif'), $validator->getDirectory(true));

        $validator->addDirectory('jpg, to');
        $this->assertEquals('temp,gif,jpg,to', $validator->getDirectory());
        $this->assertEquals(array('temp', 'gif', 'jpg', 'to'), $validator->getDirectory(true));

        $validator->addDirectory(array('zip', 'ti'));
        $this->assertEquals('temp,gif,jpg,to,zip,ti', $validator->getDirectory());
        $this->assertEquals(array('temp', 'gif', 'jpg', 'to', 'zip', 'ti'), $validator->getDirectory(true));

        $validator->addDirectory('');
        $this->assertEquals('temp,gif,jpg,to,zip,ti', $validator->getDirectory());
        $this->assertEquals(array('temp', 'gif', 'jpg', 'to', 'zip', 'ti'), $validator->getDirectory(true));
    }

    /**
     * @group ZF-11258
     */
    public function testZF11258()
    {
        $validator = new File\NotExists();
        $this->assertFalse($validator->isValid(__DIR__ . '/_files/testsize.mo'));
        $this->assertTrue(array_key_exists('fileNotExistsDoesExist', $validator->getMessages()));
        $this->assertContains("File exists", current($validator->getMessages()));
    }
}
