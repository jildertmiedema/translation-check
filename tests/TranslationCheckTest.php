<?php

use JildertMiedema\TranslationCheck\TranslationCheck;
use Mockery as m;

class TranslationCheckTest extends PHPUnit_Framework_TestCase {

    protected $loader;
    protected $checker;

    public function setUp()
    {
        $this->loader = m::mock('Illuminate\Translation\LoaderInterface');

        $this->checker = new TranslationCheck($this->loader);
    }

    public function tearDown()
    {
        m::close();
    }

    public function testCheck()
    {
        $this->loader->shouldReceive('load')->once()->andReturn(array());

        $this->checker->check();
    }
}