<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Models\Book;
use Illuminate\Support\Facades\DB;

class ViewAllBookTest extends TestCase
{
    /** @test */
    public function it_can_view_all_books()
    {

        $book1 = Book::all()->first();

        $this->get('/')->assertStatus(200)->assertSeeText($book1->title);
    }
}
