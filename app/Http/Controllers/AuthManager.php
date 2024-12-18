<?php
namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthManager extends Controller
{
    public function login()
    {
        return view('auth.login');
    }

    public function registration()
    {
        return view('auth.registration');
    }

    public function loginPost(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required',
            'role' => 'required',
        ]);

        $credentials = $request->only('username', 'password', 'role');

        // Check if login credentials are correct
        if (Auth::attempt($credentials)) {
            $user = Auth::user();

            // Check the role and redirect accordingly
            if ($user->role == 'admin') {
                return redirect()->route('equipment.index'); // Redirect to Admin Dashboard
            } elseif ($user->role == 'outsider') {
                return redirect()->route('user.equipmentlist.index'); // Redirect to User Dashboard
            }

            return redirect()->route('login')->with('error', 'Role mismatch, please try again.');
        }

        return redirect(route('login'))->with('error', 'Login details are not valid.');
    }

    public function registrationPost(Request $request)
    {
        $request->validate([
            'fullname' => 'required',
            'email' => 'required|email|unique:users',
            'username' => 'required',
            'password' => 'required|confirmed',
        ]);

        $data = [
            'fullname' => $request->fullname,
            'email' => $request->email,
            'username' => $request->username,
            'password' => Hash::make($request->password), // Hash password
            'role' => 'outsider', // Default role, modify as needed
        ];

        $user = User::create($data);

        if (!$user) {
            return redirect(route('registration'))->with('error', 'Registration failed. Try again!');
        }

        return redirect(route('login'))->with('success', 'Registration successful. Login now!');
    }

    public function logout()
    {
        Auth::logout();
        session()->invalidate(); // Invalidate the session
        session()->regenerateToken(); // Regenerate CSRF token for security
        return redirect(route('login'));
    }
}
