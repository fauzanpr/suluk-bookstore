<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Auth;
use App\Models\Category;
use Illuminate\Support\Str;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $buku = Book::with('category')->get();
        $categories = Category::all();

        $paginate = Book::orderBy('id', 'asc')->paginate(8);
        return view('landingpage', ['books' => $paginate, 'categories' => $categories]);
    }

    public function tampil()
    {
        $buku = Book::with('category')->get();
        $categories = Category::all();
        return view('admin.kelolabuku', ['books' => $buku, 'title' => 'KelolaBuku', 'categories' => $categories]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if ($request->file('cover_photo')) {
            $image = $request->file('cover_photo')->store('book_cover', 'public');
        }

        $title = $request->title;
        $slug = str::slug($title, '-');

        Book::create([
            'category_id' => $request->category_id,
            'cover_photo' => $image,
            'isbn' => $request->isbn,
            'title' => $request->title,
            'slug' => $slug,
            'author' => $request->author,
            'publisher' => $request->publisher,
            'price' => $request->price,
            'stock' => $request->stock,
        ]);

        return redirect()->route('kelolabuku.tampil')
            ->with('success', 'buku berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if ($request->file('cover_photo')) {
            $image = $request->file('cover_photo')->store('book_cover', 'public');
        }

        $title = $request->title;
        $slug = str::slug($title, '-');

        Book::create([
            'category_id' => $request->category_id,
            'cover_photo' => $image,
            'isbn' => $request->isbn,
            'title' => $request->title,
            'slug' => $slug,
            'author' => $request->author,
            'publisher' => $request->publisher,
            'price' => $request->price,
            'stock' => $request->stock,
        ]);

        return redirect()->route('kelolabuku.tampil')
            ->with('success', 'buku berhasil ditambahkan');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
