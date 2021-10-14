<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RegisterController extends Controller
{
    public function save(Request $request) {
        if (Auth::check()) {
            return redirect()->to(route('user.private'));
        }

        $validateFields = $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required|min:5|max:50'
        ]);

        if(User::where('email', $validateFields['email'])->exists()) {
            return redirect()->to(route('user.registration'))->withErrors([
                'emailError' => 'User exists'
            ]);
        }

        $user = User::create($validateFields);
        if($user){
            auth()->login($user);
            return redirect()->to(route('user.private'));
        }

        return redirect()->to(route('user.registration'))->withErrors([
            'formError' => 'Failed to register'
        ]);
    }
}
