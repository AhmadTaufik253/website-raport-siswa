<?php

namespace App\Http\Controllers;

use App\Models\Matapelajaran;
use App\Models\Raport;
use App\Models\Siswa;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RaportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = User::where('level', 'user')->get();

        return view('pages.raport.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (Auth::user()->level == 'admin') {
            $siswa = User::where('level', 'user')->get();
            $pelajaran = Matapelajaran::all();

            return view('pages.raport.create', compact('siswa', 'pelajaran'));
        } else {
            return redirect()->route('raport.index');
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
        $data = $request->all();
        $nilai = $data['nilai'];
        $pelajaran = Matapelajaran::findOrFail($data['id_pelajaran']);
        $akm = $pelajaran['akm'];
        $keterangan = "";

        if ($nilai >= $akm) {
            $keterangan = "Terpenuhi";
        } else {
            $keterangan = "Tidak terpenuhi";
        }

        Raport::create([
            'id_siswa' => $data['id_siswa'],
            'id_pelajaran' => $data['id_pelajaran'],
            'nilai' => $data['nilai'],
            'keterangan' => $keterangan
        ]);

        return redirect()->route('raport.show', $data['id_siswa']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $item = User::where('level', 'user')->findOrFail($id);
        $data = Raport::with(['mapels'])->where('id_siswa', '=', $id)->get();

        $totalMapel = 0;
        $totalNilai = 0;

        $totalMapel = $data->count();
        $totalNilai = Raport::where('id_siswa', '=', $id)->sum('nilai');

        if ($totalMapel != 0 || $totalNilai != 0) {
            $mean = $totalNilai / $totalMapel;
        } else {
            $mean = 0;
        }

        return view('pages.raport.show', compact('item', 'data', 'mean', 'totalNilai'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $item = Raport::with(['siswas', 'mapels'])->findOrFail($id);
        // dd($item);
        $siswa = User::where('level', 'user')->get();
        $pelajaran = Matapelajaran::all();

        return view('pages.raport.edit', compact('item', 'siswa', 'pelajaran'));
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
        $item = Raport::findOrFail($id);

        $data = $request->all();
        $nilai = $data['nilai'];
        $pelajaran = Matapelajaran::findOrFail($data['id_pelajaran']);
        $akm = $pelajaran['akm'];
        $keterangan = "";

        if ($nilai >= $akm) {
            $keterangan = "Terpenuhi";
        } else {
            $keterangan = "Tidak terpenuhi";
        }

        $item->update([
            'id_siswa' => $data['id_siswa'],
            'id_pelajaran' => $data['id_pelajaran'],
            'nilai' => $data['nilai'],
            'keterangan' => $keterangan
        ]);

        return redirect()->route('raport.show', $id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = Raport::findOrFail($id);

        $item->delete();

        return redirect()->route('raport.index');
    }
}