<?php

namespace Tests\Unit;

use App\Models\User;
use Nette\Utils\Random;
use Tests\TestCase;

class UpdateUserTest extends TestCase
{
    /** @test */
    public function it_can_update_user_profile()
    {
        $this->withoutExceptionHandling();
        // register new user
        $newUser = User::create([
            'name' => 'userUpdateTest',
            'email' => 'updateTest@mail.com',
            'password' => 123
        ]);

        // login
        $this->actingAs($newUser);

        // update the user name
        $newName = 'dgasjhdgjhagdhjgkasjdghahj';
        $this->post('/account/edit', [
            'name' => $newName
        ]);

        //check
        $this->assertDatabaseHas('users', [
            'name' => $newName
        ]);
    }
}
