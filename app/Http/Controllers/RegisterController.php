<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;


class RegisterController extends Controller
{
    public function save(Request $request) {
        if (Auth::check()) {
            return redirect()->to(route('user.private'));
        }
        
        $validateFields = $request->validate([
            'fio' => 'required',
            'name' => 'required|min:5',
            'email' => 'required|email',
            'password' => 'required|min:5|max:50|confirmed',
            'password_confirmation' => 'required',
            'personal_data' => 'required'
        ]);

        

        if(User::where('name', $validateFields['name'])->exists()) {
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
