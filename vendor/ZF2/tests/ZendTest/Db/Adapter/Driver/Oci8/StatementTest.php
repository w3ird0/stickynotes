<?php
namespace ZendTest\Db\Adapter\Driver\Oci8;

use Zend\Db\Adapter\Driver\Oci8\Statement;
use Zend\Db\Adapter\Driver\Oci8\Oci8;
use Zend\Db\Adapter\ParameterContainer;

class StatementTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var Statement
     */
    protected $statement;

    /**
     * Sets up the fixture, for example, opens a network connection.
     * This method is called before a test is executed.
     */
    protected function setUp()
    {
        $this->statement = new Statement;
    }

    /**
     * Tears down the fixture, for example, closes a network connection.
     * This method is called after a test is executed.
     */
    protected function tearDown()
    {
    }

    /**
     * @covers Zend\Db\Adapter\Driver\Oci8\Statement::setDriver
     */
    public function testSetDriver()
    {
        $this->assertEquals($this->statement, $this->statement->setDriver(new Oci8(array())));
    }

    /**
     * @covers Zend\Db\Adapter\Driver\Oci8\Statement::setParameterContainer
     */
    public function testSetParameterContainer()
    {
        $this->assertSame($this->statement, $this->statement->setParameterContainer(new ParameterContainer));
    }

    /**
     * @covers Zend\Db\Adapter\Driver\Oci8\Statement::getParameterContainer
     * @todo   Implement testGetParameterContainer().
     */
    public function testGetParameterContainer()
    {
        $container = new ParameterContainer;
        $this->statement->setParameterContainer($container);
        $this->assertSame($container, $this->statement->getParameterContainer());
    }

    /**
     * @covers Zend\Db\Adapter\Driver\Oci8\Statement::getResource
     * @todo   Implement testGetResource().
     */
    public function testGetResource()
    {
        // Remove the following lines when you implement this test.
        $this->markTestIncomplete(
          'This test has not been implemented yet.'
        );
    }

    /**
     * @covers Zend\Db\Adapter\Driver\Oci8\Statement::setSql
     * @todo   Implement testSetSql().
     */
    public function testSetSql()
    {
        // Remove the following lines when you implement this test.
        $this->markTestIncomplete(
          'This test has not been implemented yet.'
        );
    }

    /**
     * @covers Zend\Db\Adapter\Driver\Oci8\Statement::getSql
     * @todo   Implement testGetSql().
     */
    public function testGetSql()
    {
        // Remove the following lines when you implement this test.
        $this->markTestIncomplete(
          'This test has not been implemented yet.'
        );
    }

    /**
     * @covers Zend\Db\Adapter\Driver\Oci8\Statement::prepare
     * @todo   Implement testPrepare().
     */
    public function testPrepare()
    {
        // Remove the following lines when you implement this test.
        $this->markTestIncomplete(
          'This test has not been implemented yet.'
        );
    }

    /**
     * @covers Zend\Db\Adapter\Driver\Oci8\Statement::isPrepared
     * @todo   Implement testIsPrepared().
     */
    public function testIsPrepared()
    {
        // Remove the following lines when you implement this test.
        $this->markTestIncomplete(
          'This test has not been implemented yet.'
        );
    }

    /**
     * @covers Zend\Db\Adapter\Driver\Oci8\Statement::execute
     * @todo   Implement testExecute().
     */
    public function testExecute()
    {
        // Remove the following lines when you implement this test.
        $this->markTestIncomplete(
          'This test has not been implemented yet.'
        );
    }
}
