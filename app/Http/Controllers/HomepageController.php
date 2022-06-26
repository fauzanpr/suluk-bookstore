<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\User;
use App\Models\Chart;
use App\Models\BookUser;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Hash;

class HomepageController extends Controller
{
    public function index()
    {
        $title = 'homepage';
        $books = Book::with('category')->get();
        $categories = Category::all();
        $chart_count = count(Chart::where('user_id', auth()->user()->id)->get());

        $paginate = Book::orderBy('id', 'asc')->paginate(8);

        return view('pelanggan.homepage', ['books' => $paginate, 'paginate' => $paginate, 'title' => $title, 'chart_count' => $chart_count, 'categories' => $categories]);
    }

    public function edit(Request $request)
    {
        if ($request->file('photo') !== null) {
            $photo = $request->file('photo')->store('Foto Profil');
            User::where('id', auth()->user()->id)->update([
                'name' => $request->name,
                'photo' => $photo,
                'telp' => $request->telp,
                'province' => $request->province,
                'city' => $request->city,
                'address' => $request->address,
                'district' => $request->district
            ]);
        } else {
            User::where('id', auth()->user()->id)->update([
                'name' => $request->name,
                'telp' => $request->telp,
                'province' => $request->province,
                'city' => $request->city,
                'address' => $request->address,
                'district' => $request->district
            ]);
        }
        return redirect('/homepage');
    }
}
