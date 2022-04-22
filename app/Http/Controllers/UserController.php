<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Exception;

class UserController extends Controller
{
    public function register(Request $request) {

        $this->validate(request(), [
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if($request->password != $request->confirmation_password){
            return back()->withErrors([
                'message' => 'Las contraseñas no coinciden'
            ]);
        }

        $user = null;

        try{
            $user = User::create(request(['name', 'email', 'password']));
        } catch(Exception $e){

            return back()->withErrors([
                'message' => "Ya existe una cuenta asociada a este correo"
            ]);
        }
        
        auth()->login($user);
        return redirect()->route('upload');
    }

    public function login() {

        $this->validate(request(), [
            'email' => 'required',
            'password' => 'required'
        ]);
        
        if(auth()->attempt(request(['email', 'password'])) == false){

            return back()->withErrors([
                'message' => 'Correo o contraseña incorrecta, inténtelo otra vez'
            ]);
        }

        return redirect()->route('upload');
    }

    public function logout() {

        auth()->logout();
        return redirect()->route('login.index');
    }
}
