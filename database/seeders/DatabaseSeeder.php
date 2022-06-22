<?php

namespace Database\Seeders;

use App\Models\Book;
use App\Models\User;
use App\Models\BookUser;
use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        Category::create([
            'category_name' => 'novel'
        ]);

        Category::create([
            'category_name' => 'pengetahuan'
        ]);

        Book::create([
            'category_id' => 1,
            'cover_photo' => 'product-01',
            'isbn' => '1234567',
            'title' => 'Sebuah Seni Untuk Bersikap Bodo Amat',
            'slug' => 'sebuah-seni-untuk-bersikap-bodo-amat',
            'author' => 'Mark Manshon',
            'publisher' => 'Sirah Media',
            'price' => 110000,
            'stock' => 12
        ]);

        Book::create([
            'category_id' => 2,
            'cover_photo' => 'product-01',
            'isbn' => '1111111',
            'title' => 'Belajar Java Untuk Pemula',
            'slug' => 'belajar-java-untuk-pemula',
            'author' => 'Tiara Mustakim, dkk',
            'publisher' => 'Informatika',
            'price' => 90000,
            'stock' => 10
        ]);

        Book::create([
            'category_id' => 1,
            'cover_photo' => 'product-01',
            'isbn' => '163276832',
            'title' => 'Ketika Cinta Bertasbih',
            'slug' => 'ketika-cinta-bertasbih',
            'author' => 'Nur Alim',
            'publisher' => 'Mizan',
            'price' => 120000,
            'stock' => 11
        ]);

        User::create([
            'name' => 'fauzan',
            'email' => 'fauzanpr@gmail.com',
            'password' => Hash::make('123')
        ]);

        BookUser::create([
            'user_id' => 1,
            'book_id' => 1,
            'sub_item' => 2,
            'sub_cost' => 250000,
            'status' => 'keranjang'
        ]);

        BookUser::create([
            'user_id' => 1,
            'book_id' => 2,
            'sub_item' => 1,
            'sub_cost' => 115000,
            'status' => 'keranjang'
        ]);

    }
}
