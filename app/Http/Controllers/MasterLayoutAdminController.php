<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class MasterLayoutAdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        $user->telp = $request->telp;

        if ($request->file('photo')) {
            if ($user->photo && file_exists(storage_path('app/public/' . $user->photo))) {
                Storage::delete('public/' . $user->photo);
                $image = $request->file('photo')->store('profile', 'public');
            } else {
                $image = $request->file('photo')->store('profile', 'public');
            }
        } else {
            $image = $user->photo;
        }

        dd($image);

        $user->photo = $image;

        $user->save();
        return redirect()->route('dashboard');
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

    public function updateAll(Request $request)
    {
        // return dd($request);
        if ($request->photo === null) {
            User::where('id', auth()->user()->id)->update([
                'name' => $request->name,
                'telp' => $request->telp,
            ]);
        } else {
            $photo = $request->file('photo')->store('Foto Profil', 'public');
            User::where('id', auth()->user()->id)->update([
                'name' => $request->name,
                'photo' => $photo,
                'telp' => $request->telp
            ]);
        }
        return redirect('/dashboard');
    }
}
