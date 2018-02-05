<?php

use Wers\Helpers;
use PHPUnit\Framework\TestCase;

class HydraTest extends TestCase
{

    /**
     * @var Helpers\Hydra
     */
    private $hydra;

    /**
     * @before
     */
    public function prepareData()
    {
        $this->hydra = new Helpers\Hydra(
            [
                'string-index' => 'firstValue',
                'integer-index' => 10,
                'float-index' => 3.14,
                'object-index' => new \stdClass,
                'boolean-index-false' => false,
                'boolean-index-true' => true,
                'mixed-string-index' => 'string',
                'mixed-integer-index' => 10,
                'mixed-float-index' => 3.14,
                'mixed-object-index' => new \stdClass,
                'mixed-boolean-index-true' => true,
                'mixed-boolean-index-false' => false,

            ]
        );
    }

    /**
     * @covers \Wers\Helpers\Hydra::offsetGetString()
     * @throws Exception
     */
    public function testOffsetGetString()
    {
        $this->assertEquals(
            'firstValue',
            $this->hydra->offsetGetString('string-index')
        );
        $this->assertEquals(
            'default',
            $this->hydra->offsetGetString('not-exists-index', 'default')
        );
        $this->assertEquals(
            '',
            $this->hydra->offsetGetString('not-exists-index', '')
        );
    }

    /**
     * @covers \Wers\Helpers\Hydra::offsetGetInt()
     * @throws Exception
     */
    public function testOffsetGetInt()
    {
        $this->assertEquals(10, $this->hydra->offsetGetInt('integer-index'));
        $this->assertEquals(10, $this->hydra->offsetGetInt('not-exists-index', 10));
    }

    /**
     * @covers \Wers\Helpers\Hydra::offsetGetFloat()
     * @throws Exception
     */
    public function testOffsetGetFloat()
    {
        $this->assertEquals(3.14, $this->hydra->offsetGetFloat('float-index'));
        $this->assertEquals(2.71, $this->hydra->offsetGetFloat('not-exists-index', 2.71));
    }

    /**
     * @covers \Wers\Helpers\Hydra::offsetGetBool()
     * @throws Exception
     */
    public function testOffsetGetBool()
    {
        $this->assertEquals(false, $this->hydra->offsetGetBool('boolean-index-false'));
        $this->assertEquals(true, $this->hydra->offsetGetBool('boolean-index-true'));
        $this->assertEquals(true, $this->hydra->offsetGetBool('not-exists-index', true));
        $this->assertNotEquals(false, $this->hydra->offsetGetBool('not-exists-index', true));
    }

    /**
     * @covers \Wers\Helpers\Hydra::offsetGetObject()
     * @throws Exception
     */
    public function testOffsetGetObject()
    {
        $this->assertInstanceOf(
            '\stdClass',
            $this->hydra->offsetGetObject('object-index')
        );
        $this->assertInstanceOf(
            '\stdClass',
            $this->hydra->offsetGetObject('not-exists-index', '\stdClass')
        );
    }

    /**
     * @covers \Wers\Helpers\Hydra::offsetGetMixed()
     * @throws Exception
     */
    public function testOffsetGetMixed()
    {
        $this->assertEquals('string', $this->hydra->offsetGetMixed('mixed-string-index'));
        $this->assertEquals(10, $this->hydra->offsetGetMixed('mixed-integer-index'));
        $this->assertEquals(3.14, $this->hydra->offsetGetMixed('mixed-float-index'));
        $this->assertInstanceOf('\stdClass', $this->hydra->offsetGetMixed('mixed-object-index'));
        $this->assertEquals(true, $this->hydra->offsetGetMixed('mixed-boolean-index-true'));
        $this->assertEquals(true, $this->hydra->offsetGetMixed('missing-index', true));
        $this->assertEquals(false, $this->hydra->offsetGetMixed('mixed-boolean-index-false'));
    }


    /**
     * @covers \Wers\Helpers\Hydra::__construct()
     * @throws Exception
     */
    public function testConstruct()
    {
        $this->assertInstanceOf('\Wers\Helpers\Hydra', $this->hydra);
    }

}
