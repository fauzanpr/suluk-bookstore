<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;



class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = DB::table('users')->where('role', '=', '2')->orderBy('id', 'desc')->paginate(5);

        $paginate = DB::table('users')->orderBy('id', 'desc')->paginate(5);

        $title = "kelolapelanggan";

        return view('admin.kelolapelanggan', ['users' => $users, 'paginate' => $paginate, 'title' => $title]);
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
        //
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
        $user = User::find($id);

        $user->name = $request->name;
        $user->email = $request->email;
        $user->telp = $request->telp;
        $user->province = $request->province;
        $user->city = $request->city;
        $user->district = $request->district;
        $user->address = $request->address;

        if ($request->file('photo')) {
            if ($user->photo && file_exists(storage_path('app/public/' . $user->photo))) {
                Storage::delete('public/' . $user->photo);
            }
            $image = $request->file('photo')->store('profile', 'public');
        } else {
            $image = $user->photo;
        }




        $user->photo = $image;

        $user->save();
        return redirect()->route('kelolapelanggan.index')
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
        $user = User::find($id);

        if ($user->photo && file_exists(storage_path('app/public/' . $user->photo))) {
            Storage::delete('public/' . $user->photo);
        }

        $user->delete();
        return redirect()->route('kelolapelanggan.index')
            ->with('success', 'pelanggan berhasil dihapus');
    }
}
