<?php

namespace GoldSpecDigital\ObjectOrientedOAS\Tests\Objects;

use GoldSpecDigital\ObjectOrientedOAS\Objects\Reference;
use GoldSpecDigital\ObjectOrientedOAS\Tests\TestCase;

class ReferenceTest extends TestCase
{
    /** @test */
    public function create_with_all_parameters_works()
    {
        $reference = Reference::create()->dollarRef('pet.json');

        $this->assertEquals([
            '$ref' => 'pet.json',
        ], $reference->toArray());
    }
}