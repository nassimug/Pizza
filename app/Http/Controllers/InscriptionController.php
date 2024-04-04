<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class InscriptionController extends Controller
{
    public function __invoke(){}
    public function InscriptionForm(){
        return view('Inscription');
    }

    public function Inscription(Request $request){
        $request->validate([
        'nom' => 'required|string|max:50',
        'prenom' => 'required|string|max:50', 
        'login' => 'required|string|max:30|unique:users',
        'mdp' => 'required|string|confirmed']);

        $user = new User();
        $user->nom = $request->nom;
        $user->prenom = $request->prenom;
        $user->login = $request->login;
        $user->mdp = Hash::make($request->mdp);
        $user->save();
        Auth::login($user);
        $request->session()->flash('etat', 'votre compte a bien été créer !');
        return redirect()->route('home');
    }

    public function ModifierMDPForm(){
        return view('ModifMDP');
    }
    public function ModifierMDP(Request $request){
        $request->validate([
            'current_password' => 'required|string',
            'password' => 'required|string|confirmed',
        ]);

        $user = Auth::user();

        if (!Hash::check($request->current_password, $user->mdp)) {
            return back()->withErrors(['current_password' => 'Le mot de passe actuel est incorrect.']);
        }

        $user->mdp = Hash::make($request->password);
        $user->save();

        $request->session()->flash('etat', 'Le mot de passe a été modifié avec succès !');
        return redirect()->route('home');
    }



    public function formCreateAdmin(){
        return view('CompteAdmin');
    }
    public function createAdmin(Request $request)
    {
        $request->validate([
            'nom' => 'required|string|max:50',
            'prenom' => 'required|string|max:50', 
            'login' => 'required|string|max:30|unique:users',
            'mdp' => 'required|string|confirmed']);

        $user = new User();
        $user->nom = $request->nom;
        $user->prenom = $request->prenom;
        $user->login = $request->login;
        $user->mdp = Hash::make($request->mdp);
        $user->type = 'admin'; // set user type to admin
        $user->save();
        Auth::login($user);
        $request->session()->flash('etat', 'Le compte admin a bien été créer');
        return redirect()->route('home');
    }

    public function formCreateCook(){
        return view('CompteCook');
    }
    public function createCook(Request $request)
    {
        $request->validate([
            'nom' => 'required|string|max:50',
            'prenom' => 'required|string|max:50', 
            'login' => 'required|string|max:30|unique:users',
            'mdp' => 'required|string|confirmed']);

        $user = new User();
        $user->nom = $request->nom;
        $user->prenom = $request->prenom;
        $user->login = $request->login;
        $user->mdp = Hash::make($request->mdp);
        $user->type = 'cook'; // set user type to admin
        $user->save();
        Auth::login($user);
        $request->session()->flash('etat', 'Le compte cook a bien été créer');
        return redirect()->route('cook');
    }
    
    public function listeUtilisateurs()
    {
        $users = User::paginate(6); 
        return view('ListeUtilisateurs', compact('users'));
    }
    
  public function deleteUser($id)
{
    $user = User::findOrFail($id);
    
    if ($user->type === 'user') {
        return redirect()->route('utilisateurs.index')->with('etat', 'Vous ne pouvez pas supprimer un compte utilisateur.');
    }
    
    $user->delete();
    return redirect()->route('utilisateurs.index')->with('etat', 'compte supprimé avec succès.');
}



}
