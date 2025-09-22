<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;

class ResetPasswordController extends Controller
{
    /**
     * Tampilkan form reset password.
     */
    public function showForm($token)
    {
        return view('reset-password', ['token' => $token]);
    }

    /**
     * Reset password pengguna.
     */
    public function reset(Request $request)
    {
        $request->validate([
            'token' => 'required',
            'email' => 'required|email',
            'password' => 'required|confirmed|min:6',
        ]);

        $record = DB::table('password_reset_tokens')->where('token', $request->token)->first();

        if (!$record || $record->email !== $request->email) {
            return back()->withErrors(['email' => 'Email atau token tidak valid.']);
        }
        
        $user = User::where('email', $record->email)->first();
        if (!$user) {
            return back()->withErrors(['email' => 'Pengguna tidak ditemukan.']);
        }
        
        $user->password = Hash::make($request->password);
        $user->save();
        
        DB::table('password_reset_tokens')->where('email', $record->email)->delete();
        
        return redirect()->route('login.form')->with('success', 'Password berhasil direset. Silakan login.');
    }
}
