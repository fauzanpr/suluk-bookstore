<?php

namespace Tests\Unit;

use App\Models\Book;
use App\Models\Chart;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Tests\TestCase;

class DeleteChartTest extends TestCase
{
    /** @test */
    public function it_can_delete_chart()
    {

        $this->withoutExceptionHandling();
        // login
        $user = User::create([
            'name' => 'testChart',
            'email' => 'emailChart@mail.com',
            'password' => '123',
        ]);

        $this->post('/login', [
            'email' => $user->email,
            'password' => $user->password
        ]);

        $this->actingAs($user);

        // get first product
        $firstBook = Book::get()->first();

        $URI = '/chart/add/' . $firstBook->id;

        // add a chart
        $this->post($URI, [
            'num_product' => 2,
        ]);

        $this->assertDatabaseHas('charts', [
            'user_id' => $user->id,
            'book_id' => $firstBook->id
        ]);

        // mengambil charts id yang pertama
        $firstChart = Chart::get()->first();

        // delete chart
        $URI = 'chart/delete/' . $firstChart->id;
        $this->get($URI);

        // check
        $this->assertDatabaseMissing('charts', [
            'user_id' => $user->id,
            'id' => $firstChart->id,
        ]);
    }
}
