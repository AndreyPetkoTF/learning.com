<?php

namespace Tests\AppBundle\Pattern;


use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

/**
 * Class TemplateTest
 * @package Tests\AppBundle\Pattern
 */
class TemplateTest extends WebTestCase
{
    /**
     * @var
     */
    private $turkeySub;

    /**
     *
     */
    public function setUp()
    {
        self::bootKernel();
        $this->turkeySub = static::$kernel->getContainer()->get('learning.template.turkey_sub');
    }

    /**
     *
     */
    public function testIndex()
    {
        $this->assertEquals(true, true);
    }
}