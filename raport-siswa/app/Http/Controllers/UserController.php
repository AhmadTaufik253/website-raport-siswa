<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = User::where('level', 'user')->get();

        return view('pages.siswa.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (Auth::user()->level == 'admin') {
            return view('pages.siswa.create');
        } else {
            return redirect()->route('siswa.index');
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (Auth::user()->level == 'admin') {
            $data = $request->all();

            User::create([
                'name' => $data['name'],
                'nis' => $data['nis'],
                'alamat' => $data['alamat'],
                'password' => Hash::make($data['password'])
            ]);

            return redirect()->route('siswa.index');
        } else {
            return redirect()->route('siswa.index');
        }
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
        if (Auth::user()->level == 'admin') {
            $item = User::findOrFail($id);

            return view('pages.siswa.edit', compact('item'));
        } else {
            return redirect()->route('siswa.index');
        }
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
        if (Auth::user()->level == 'admin') {
            $item = User::findOrFail($id);

            $data = $request->only('name', 'nis', 'email', 'alamat');

            $item->update($data);

            return redirect()->route('siswa.index');
        } else {
            return redirect()->route('siswa.index');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (Auth::user()->level == 'admin') {
            $item = User::findOrFail($id);

            $item->delete();

            return redirect()->route('siswa.index');
        } else {
            return redirect()->route('siswa.index');
        }
    }
}