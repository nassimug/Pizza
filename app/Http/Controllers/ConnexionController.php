<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ConnexionController extends Controller
{
    public function ConnexionForm(){
        return view('Connexion');
    }
    public function Connexion(Request $request){
        $request->validate([
        'login' => 'required|string',
        'mdp' => 'required|string']);

        $credentials = ['login' => $request->input('login'),
        'password' => $request->input('mdp')];

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->route('home');
        }

        return back()->withErrors([
        'login' => 'indentifiant ou mdp incorrect']);
    }

    public function Déconnexion(Request $request){
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }
}