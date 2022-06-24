<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Book;
use App\Models\BookUser;

class HomepageController extends Controller
{
    public function index()
    {
        $title = 'homepage';
        $books = Book::with('category')->get();
        $categories = Category::all();
        $chart_count = count(BookUser::where('user_id', auth()->user()->id)->get());

        $paginate = Book::orderBy('id', 'asc')->paginate(8);

        return view('pelanggan.homepage', ['books' => $books, 'paginate' => $paginate, 'title' => $title, 'chart_count' => $chart_count, 'categories' => $categories]);
    }
}
