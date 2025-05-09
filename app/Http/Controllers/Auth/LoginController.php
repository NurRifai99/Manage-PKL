<?php

// app/Http/Controllers/Auth/LoginController.php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{

    public function view(Request $request){
        return view('auth.login');
    }

    public function login(Request $request)
    {
        // Validasi login
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        // Cek kredensial dan login
        if (Auth::attempt($request->only('email', 'password'))) {
            return $this->redirectAfterLogin();
        }

        return redirect()->back()->withErrors([
            'email' => 'These credentials do not match our records.',
        ]);
    }

    // Mengarahkan ke dashboard sesuai dengan role user
    protected function redirectAfterLogin()
    {
        $user = Auth::user();

        // Redirect berdasarkan role user
        if ($user->hasRole('siswa') ) {
            return redirect()->route('filament.siswa.pages.dashboard'); // Dashboard Siswa
        }

        if ($user->hasRole('guru')) {
            return redirect()->route('filament.guru.pages.dashboard'); // Dashboard Guru
        }

        if ($user->hasRole('super_admin')) {
            return redirect()->route('filament.admin.pages.dashboard'); // Dashboard Admin
        }

        return redirect('/'); // Redirect default jika role tidak ditemukan
    }
}
