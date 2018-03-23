<?php

namespace Bellisq\WebApplication\Tests\TestCases;

use Bellisq\WebApplication\Filter\FilterResultContainer;
use PHPUnit\Framework\TestCase;
use stdClass;


class FilterResultContainerTest
    extends TestCase
{
    public function testBehavior()
    {
        $frc = new FilterResultContainer;
        $frc->add(new stdClass);
        $frc->add($this, 'invalidName');

        $res = $frc->getResultArray();

        $this->assertEquals(2, count($res));

        $this->assertArrayHasKey(0, $res);
        $this->assertInstanceOf(stdClass::class, $res[0]);

        $this->assertArrayHasKey(1, $res);
        $this->assertTrue(is_array($res[1]));

        $this->assertArrayHasKey(0, $res[1]);
        $this->assertInstanceOf(self::class, $res[1][0]);

        $this->assertArrayHasKey(1, $res[1]);
        $this->assertEquals('invalidName', $res[1][1]);
    }
}