<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Mail;

class ForgotPasswordController extends Controller
{
    public function showForm()
    {
        return view('forgot-password');
    }

    public function sendResetLink(Request $request)
    {
        $request->validate(['email' => 'required|email']);

        $token = Str::random(64);

        DB::table('password_reset_tokens')->updateOrInsert(
            ['email' => $request->email],
            ['token' => $token, 'created_at' => now()]
        );

        // Kirim email menggunakan tampilan Blade
        $link = url('/reset-password/' . $token);

        Mail::send([], [], function ($message) use ($request, $link) {
            $message->to($request->email)
                ->subject('Reset Password Anda')
                ->html("Klik link ini untuk reset password: <a href='$link'>$link</a>"); // Perbaikan di sini
        });

        return back()->with('success', 'Link reset password sudah dikirim ke email Anda.');
    }
}
