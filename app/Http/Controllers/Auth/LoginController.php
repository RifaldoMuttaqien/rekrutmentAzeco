<?php
namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log; // Tambahkan ini

class LoginController extends Controller
{
    use AuthenticatesUsers;

    /**
     * Redirect to different pages based on user role.
     *
     * @return string
     */
    protected function redirectTo()
    {
        // Ambil peran pengguna setelah login
        $role = Auth::user()->role;
    

        if ($role === 'admin') {
            return '/home'; 
        } elseif ($role === 'applicant') {
            return '/pelamar'; 
        }

        return '/login';
    }
}
