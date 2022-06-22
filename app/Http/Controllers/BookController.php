<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Auth;

class BookController extends Controller
{
    public function index() {
        return view('landingpage', [
            'books' => Book::orderBy('id', 'asc')->paginate(8)
        ]);
    }

    public function show(Book $book) {
        return view('quickview', [
            'book' => $book
        ]);
    }
}
