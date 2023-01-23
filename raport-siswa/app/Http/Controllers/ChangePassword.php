<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ChangePassword extends Controller
{
    public function changepass()
    {
        $item = Auth::user();

        return view('pages.admin.changepassword', compact('item'));
    }

    public function updatepass(Request $request)
    {
        $data = $request->only('password');
        $item = Auth::user();

        $item->update([
            'password' => Hash::make($data['password'])
        ]);

        return redirect()->route('admin.index');
    }
}