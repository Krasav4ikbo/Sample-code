<?php
namespace tests;

use PHPUnit\Framework\TestCase;
use src\Depth;

class DepthTest extends TestCase
{
    /**
     * Data provider
    */
    public function getData()
    {
        return [
            [
                'array' => [1,3,2,1,2,1,5,3,3,4,2],
                'expected' => 2
            ],
            [
                'array' => [5,8],
                'expected' => 0
            ],
            [
                'array' => [1,2,4,3,4],
                'expected' => 1],
            [
                'array' => [5,2,4,3,4],
                'expected' => 2
            ],
            [
                'array' => [1,2,3,8,2,35,2,4,3,4],
                'expected' => 6
            ],
        ];
    }

    /** @test */
    public function testFreeArray()
    {
        $this->assertEquals(
            0,
            Depth::solution([])
        );
    }

    /** @test */
    public function testDataExamples()
    {
        foreach ( $this->getData() as $item ) {
            $this->assertEquals(
                $item['expected'],
                Depth::solution($item['array'])
            );
        }
    }
}
