<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Pizza;
use App\Models\User;
use App\Models\Commande;
use Illuminate\Support\Str;

class PizzaController extends Controller
{
    public function Supprimer(Request $request){
        $pizza = Pizza::find($request->id);
        $pizza->delete();
        session()->flash('etat','Suppression effectué!');
        return redirect()->route('home');
    }

    public function AjouterForm(){
        return view('AjoutPizza');
    }
    public function Ajouter(Request $request){
        $request->validate([
            'nom' => 'required|max:20',
            'description' => 'required|max:100',
            'prix' => 'bail|required|numeric',
            'image' => 'nullable'
        ]);

            $pizza = new Pizza();
            $pizza->nom = $request->nom;
            $pizza->description = $request->description;
            $pizza->prix = $request->prix;

            if ($request->hasFile('image')) {
            $image = $request->file('image');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images'), $filename);
            $pizza->image = $filename;
            }

            $pizza->save();

            $request->session()->flash('etat', 'Ajout effectué !');
            return redirect()->route('home');
    }

    public function ModifierForm(Request $request){
        $pizza = Pizza::find($request->id);
        return view('ModifPizza', [
                'nom' => $pizza->nom,
                'description' => $pizza->description,
                'prix' => $pizza->prix,
                'image' => $pizza->image_url // or $pizza->image_filename
        ]);

    }
    public function Modifier(Request $request){
        $validated = $request->validate([
            'nom' => 'required|max:20',
            'description' => 'required|max:100',
            'prix' => 'bail|required|numeric',
            'image' => 'nullable'
            ]);
            $pizza = Pizza::find($request->id);
            $pizza->nom = $validated['nom'];
            $pizza->description = $validated['description'];
            $pizza->prix = $validated['prix'];

            if ($request->hasFile('image')) {
            $image = $request->file('image');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images'), $filename);
            $pizza->image = $filename;
            }

            $pizza->save();
            $request->session()->flash('etat', 'Modification effectué !');
            return redirect()->route('home');
    }

}
