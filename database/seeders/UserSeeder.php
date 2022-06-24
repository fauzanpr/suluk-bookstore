<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $datas = [
            [
                'id' => 1,
                'name' => 'Fauzan Pradana',
                'email' => 'Fauzan@gmail.com',
                'telp' => '089783728378',
                'province' => 'Jawa Timur',
                'city' => 'blitar',
                'district' => 'kauman',
                'address' => 'Jalan raya mawar',
                'password' => '1234',
                'role' => 1,
            ],
            [
                'id' => 2,
                'name' => 'Ahmad Rafif Alaudin',
                'email' => 'rafif@gmail.com',
                'telp' => '089783728378',
                'province' => 'Jawa Timur',
                'city' => 'kediri',
                'district' => 'sukorame',
                'address' => 'Jalan anggraini',
                'password' => '1234',
                'role' => 1,
            ],
            [
                'id' => 3,
                'name' => 'udin',
                'email' => 'udin@gmail.com',
                'telp' => '0898748378738',
                'province' => 'Jawa Timur',
                'city' => 'Malang',
                'district' => 'Blimbing',
                'address' => 'Jalan mawar',
                'password' => '1234',
                'role' => 2,
            ],
            [
                'id' => 4,
                'name' => 'ucok',
                'email' => 'ucok@gmail.com',
                'telp' => '082141687263',
                'province' => 'Jawa Timur',
                'city' => 'Malang',
                'district' => 'kesamben',
                'address' => 'Jalan A.Yani',
                'password' => '1234',
                'role' => 2,
            ],
            [
                'id' => 5,
                'name' => 'baba',
                'email' => 'baba@gmail.com',
                'telp' => '085334266778',
                'province' => 'Jawa Timur',
                'city' => 'Kediri',
                'district' => 'Pesantren',
                'address' => 'Jalan Tikus',
                'password' => '1234',
                'role' => 2,
            ],
            [
                'id' => 6,
                'name' => 'Sukardi',
                'email' => 'Sukardi@gmail.com',
                'telp' => '085557393872',
                'province' => 'Jawa Timur',
                'city' => 'Tulungagung',
                'district' => 'Bandung',
                'address' => 'Jalan Soehat',
                'password' => '1234',
                'role' => 2,
            ],
            [
                'id' => 7,
                'name' => 'Yohanes',
                'email' => 'Yohanes@gmail.com',
                'telp' => '089667352996',
                'province' => 'Jawa Timur',
                'city' => 'Malang',
                'district' => 'Dinoyo',
                'address' => 'Jalan Petir',
                'password' => '1234',
                'role' => 2,
            ],
            [
                'id' => 8,
                'name' => 'Jessica',
                'email' => 'Jessica@gmail.com',
                'telp' => '082167827655',
                'province' => 'Jawa Timur',
                'city' => 'Malang',
                'district' => 'pakis',
                'address' => 'Jalan bandara',
                'password' => '1234',
                'role' => 2,
            ],
            [
                'id' => 9,
                'name' => 'Tono',
                'email' => 'Tono@gmail.com',
                'telp' => '085667565438',
                'province' => 'Jawa Timur',
                'city' => 'Malang',
                'district' => 'pakis',
                'address' => 'Jalan Melawai',
                'password' => '1234',
                'role' => 2,
            ],
            [
                'id' => 10,
                'name' => 'Yono',
                'email' => 'Yono@gmail.com',
                'telp' => '085557393872',
                'province' => 'Jawa Timur',
                'city' => 'Tulungagung',
                'district' => 'Bandung',
                'address' => 'Jalan Soehat',
                'password' => '1234',
                'role' => 2,
            ],
            [
                'id' => 11,
                'name' => 'Jihan',
                'email' => 'Jihan@gmail.com',
                'telp' => '08963267338',
                'province' => 'Jawa Timur',
                'city' => 'Kediri',
                'district' => 'Lirboyo',
                'address' => 'Jalan kuat',
                'password' => '1234',
                'role' => 2,
            ],
            [
                'id' => 12,
                'name' => 'Sanusi',
                'email' => 'Sanusi@gmail.com',
                'telp' => '082141562788',
                'province' => 'Jawa Timur',
                'city' => 'Blitar',
                'district' => 'Suberatum',
                'address' => 'Jalan Diponegoro',
                'password' => '1234',
                'role' => 2,
            ],
            [
                'id' => 13,
                'name' => 'Sukardhamadji',
                'email' => 'Sukardhamadji@gmail.com',
                'telp' => '085526387663',
                'province' => 'Jawa Timur',
                'city' => 'Kediri',
                'district' => 'Kota',
                'address' => 'Jalan Joko Tingkir',
                'password' => '1234',
                'role' => 2,
            ],

        ];

        User::insert($datas);
    }
}
