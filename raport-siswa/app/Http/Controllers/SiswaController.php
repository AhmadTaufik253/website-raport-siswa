<?php

namespace App\Http\Controllers;

use App\Models\Raport;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class SiswaController extends Controller
{
    public function profile()
    {
        return view('pages.siswapage.profile');
    }

    public function raport($id)
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

    public function changepass()
    {
        $item = Auth::user();

        return view('pages.siswapage.changepassword', compact('item'));
    }

    public function updatepass(Request $request)
    {
        $data = $request->only('password');
        $item = Auth::user();

        $item->update([
            'password' => Hash::make($data['password'])
        ]);

        return redirect()->route('profile');
    }
}