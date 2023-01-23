<?php

namespace App\Http\Controllers;

use App\Models\Matapelajaran;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MatapelajaranController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Matapelajaran::all();

        return view('pages.matapelajaran.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (Auth::user()->level == 'admin') {
            return view('pages.matapelajaran.create');
        } else {
            return redirect()->route('matapelajaran.index');
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

            Matapelajaran::create($data);

            return redirect()->route('matapelajaran.index');
        } else {
            return redirect()->route('matapelajaran.index');
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
            $item = Matapelajaran::findOrFail($id);

            return view('pages.matapelajaran.edit', compact('item'));
        } else {
            return redirect()->route('matapelajaran.index');
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
            $item = Matapelajaran::findOrFail($id);

            $data = $request->all();

            $item->update($data);

            return redirect()->route('matapelajaran.index');
        } else {
            return redirect()->route('matapelajaran.index');
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
            $item = Matapelajaran::findOrFail($id);

            $item->delete();

            return redirect()->route('matapelajaran.index');
        }
    }
}