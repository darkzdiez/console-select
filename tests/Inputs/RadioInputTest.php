<?php
namespace Tests\Inputs;

use AporteWeb\Console\Inputs\RadioInput;
use PHPUnit\Framework\TestCase;

class RadioInputTest extends TestCase
{
    /**
     * @test
     */
    public function it_selects()
    {
        $checkbox = new RadioInput('Select an item!', ['a', 'b', 'c']);

        $checkbox->select('a');
        $selections = $checkbox->getSelections();
        $this->assertCount(1, $selections);
        $this->assertEquals('a', $selections[0]);

        $checkbox->select('b');
        $selections = $checkbox->getSelections();
        $this->assertCount(1, $selections);
        $this->assertEquals('b', $selections[0]);

        $checkbox->select('c');
        $selections = $checkbox->getSelections();
        $this->assertCount(1, $selections);
        $this->assertEquals('c', $selections[0]);
    }

    /**
     * @test
     * @expectedException  AporteWeb\Console\Inputs\Exceptions\UnknownOption
     */
    public function it_throws_exception_on_selects()
    {
        $checkbox = new RadioInput('Select an item!', ['a', 'b', 'c']);

        $checkbox->select('f');
    }
}
