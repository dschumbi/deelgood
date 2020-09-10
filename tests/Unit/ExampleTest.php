<?php

namespace Tests\Unit;

use App\Category;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ExampleTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testBasicTest()
    {
        //Given i have two categories in the database
        $auction = factory(Category::class)->create();
        //When i fecth the categories
        $category = Category::categories();

        //Then the response should be in the proper format
        $this->assertCount(1, $category);
    }
}
