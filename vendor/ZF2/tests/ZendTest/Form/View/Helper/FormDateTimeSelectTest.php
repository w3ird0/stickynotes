<?php
/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      http://github.com/zendframework/zf2 for the canonical source repository
 * @copyright Copyright (c) 2005-2012 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 * @package   Zend_Form
 */

namespace ZendTest\Form\View\Helper;

use Zend\Form\Element\DateTimeSelect;
use Zend\Form\View\Helper\FormDateTimeSelect as FormDateTimeSelectHelper;

/**
 * @category   Zend
 * @package    Zend_Form
 * @subpackage UnitTest
 */
class FormDateTimeSelectTest extends CommonTestCase
{
    public function setUp()
    {
        $this->helper = new FormDateTimeSelectHelper();
        parent::setUp();
    }

    public function testRaisesExceptionWhenNameIsNotPresentInElement()
    {
        $element = new DateTimeSelect();
        $this->setExpectedException('Zend\Form\Exception\DomainException', 'name');
        $this->helper->render($element);
    }

    public function testGeneratesFiveSelectsWithElementByDefault()
    {
        $element = new DateTimeSelect('foo');
        $markup  = $this->helper->render($element);
        $this->assertContains('<select name="day"', $markup);
        $this->assertContains('<select name="month"', $markup);
        $this->assertContains('<select name="year"', $markup);
        $this->assertContains('<select name="hour"', $markup);
        $this->assertContains('<select name="minute"', $markup);
        $this->assertNotContains('<select name="second"', $markup);
    }

    public function testGeneratesSecondSelectIfAskedByElement()
    {
        $element = new DateTimeSelect('foo');
        $element->setShouldShowSeconds(true);
        $markup  = $this->helper->render($element);
        $this->assertContains('<select name="day"', $markup);
        $this->assertContains('<select name="month"', $markup);
        $this->assertContains('<select name="year"', $markup);
        $this->assertContains('<select name="hour"', $markup);
        $this->assertContains('<select name="minute"', $markup);
        $this->assertContains('<select name="second"', $markup);
    }

    public function testCanGenerateSelectsWithEmptyOption()
    {
        $element = new DateTimeSelect('foo');
        $element->setShouldCreateEmptyOption(true);
        $markup  = $this->helper->render($element);
        $this->assertContains('<select name="day"', $markup);
        $this->assertContains('<select name="month"', $markup);
        $this->assertContains('<select name="year"', $markup);
        $this->assertContains('<select name="hour"', $markup);
        $this->assertContains('<select name="minute"', $markup);
        $this->assertContains('<option value=""></option>', $markup);
    }

    public function testInvokeProxiesToRender()
    {
        $element = new DateTimeSelect('foo');
        $markup  = $this->helper->__invoke($element);
        $this->assertContains('<select name="day"', $markup);
        $this->assertContains('<select name="month"', $markup);
        $this->assertContains('<select name="year"', $markup);
        $this->assertContains('<select name="hour"', $markup);
        $this->assertContains('<select name="minute"', $markup);
    }

    public function testInvokeWithNoElementChainsHelper()
    {
        $this->assertSame($this->helper, $this->helper->__invoke());
    }
}
