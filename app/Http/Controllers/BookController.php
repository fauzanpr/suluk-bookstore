<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

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
        return view('landingpage', ['books' => $buku, 'categories' => $categories]);
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
        $book = Book::find($id);

        $title = $request->title;
        $slug = str::slug($title, '-');

        $book->category_id = $request->category_id;
        $book->isbn = $request->isbn;
        $book->title = $request->title;
        $book->slug = $slug;
        $book->author = $request->author;
        $book->publisher = $request->publisher;
        $book->price = $request->price;
        $book->stock = $request->stock;

        if ($request->file('cover_photo')) {
            if ($book->cover_photo && file_exists(storage_path('app/public/' . $book->cover_photo))) {
                Storage::delete('public/' . $book->cover_photo);
            }
            $image = $request->file('cover_photo')->store('book_cover', 'public');
        } else {
            $image = $book->cover_photo;
        }




        $book->cover_photo = $image;

        $book->save();
        return redirect()->route('kelolabuku.tampil')
            ->with('success', 'buku berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $buku = Book::find($id);

        if ($buku->cover_photo && file_exists(storage_path('app/public/' . $buku->cover_photo))) {
            Storage::delete('public/' . $buku->cover_photo);
        }

        $buku->delete();
        return redirect()->route('kelolabuku.tampil')
            ->with('success', 'buku berhasil dihapus');
    }
}
