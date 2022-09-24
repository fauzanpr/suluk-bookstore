<?php

namespace Tests\Unit;

use App\Models\User;
use Tests\TestCase;
use Illuminate\Support\Facades\DB;

class VisitRegisterTest extends TestCase
{
    /** @test */
    public function it_can_visit_register() {
        $this->get('/')->assertStatus(200);
    }

    /** @test */
    public function it_can_register() {

        // membuat data baru untuk cek id terakhir
        $lastId = DB::table('users')->insertGetId([
            'name' => 'record last',
            'email' => 'email last record',
            'password' => 'passlast',
        ]);

        // membuat user baru
        $id = $lastId + 1;
        $user_name = 'testing_name';
        $user_email = 'testingEmail@ggmail.com';
        $user_password = '123';

        // cek apakah ada email sudah dipakai, jika sudah maka hapus
        $mail = User::where('email', $user_email)->get();
        if (sizeof($mail) > 0) {
            $std = User::where('email','like', '%' . $user_email. '%')->get()->first();
            User::find($std->id)->delete();
        }

        // melakukan register
        $this->post('/register', [
            'name' => $user_name,
            'email' => $user_email,
            'password' => $user_password,
        ]);

        // cek di database
        $this->assertDatabaseHas('users', [
            'id' => $id,
            'name' => $user_name,
            'email' => $user_email,
        ]);
    }
}
