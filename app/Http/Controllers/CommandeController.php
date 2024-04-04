<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;
use App\Models\Pizza;
use App\Models\User;
use App\Models\Commande;


class CommandeController extends Controller
{
   public function voirPanier(Request $request){  
        $pizza = Pizza::select('id', 'nom', 'prix', 'image')->get();
                $panier = array();
                $total = 0;
                foreach ($pizza as $p) {
            if ($request->session()->has($p->nom)) {
                $quantite = $request->session()->get($p->nom);
                $panier[$p->nom] = [
                    $quantite,
                    $p->prix,
                    $p->image 
                ];
                $total = $total + ($p->prix * $quantite);
            }
        }

        return view('Panier',['panier'=>$panier,'total'=>$total,'pizza'=>$pizza]);
    }
    

    public function ajoutPanier(Request $request){ 
        if ($request->session()->has($request->nom)) {
            $i = $request->session()->get($request->nom);
            $request->session()->put($request->nom, $i+1);
            return redirect()->route('home');
        }  
        $request->session()->put($request->nom, 1);
        return redirect()->route('home');
    }

    public function ajoutPanierRapide(Request $request){ 
        $i = $request->session()->get($request->nom);
        $request->session()->put($request->nom, $i+1);
        return redirect()->route('panier');
    }

    public function deletePanier(Request $request){ 
        $i = $request->session()->get($request->nom);
        $request->session()->put($request->nom, $i-1);

        if ($request->session()->get($request->nom) <= 0) {
            $request->session()->forget($request->nom);
        }
        return redirect()->route('panier');
    }

  public function creationCommande(Request $request){
        $user = Auth::user();
        $commande = new Commande();
        $commande->user_id = $user->id;
        $commande->statut = 'envoye';
        $commande->save();
        $panier = array();
        $total = 0;
        foreach ($request->session()->all() as $key => $value) {
            if (in_array($key, ['_token', '_previous', 'etat', 'user_id'])) {
                continue;
            }
            $p = Pizza::where('nom',$key)->first();
            if ($p) {
            $commande->pizza()->attach($p, ['qte' => $value]);
            $total += $p->prix * $value;
            $request->session()->forget($key);
            } else {
                // Pizza non trouvée, gestion de l'erreur
            }
        }
        $request->session()->flash('etat', 'Commande envoyée ! ');
        return redirect()->route('home');
    }


    public function statutView(Request $request){
            return view('StatutCommande',['id'=>$request->id]);
    }

    public function statutModif(Request $request){
        $commande = Commande::find($request->id);
        $commande->statut = $request->statut;
        $commande->save();
        return redirect()->route('home');
    }

    public function detailCommande(Request $request)
{
    $commande = Commande::find($request->id);
    $pizza = $commande->pizza()->get();
    $qte = array();
    $total = 0;
    foreach ($pizza as $p) {
        $qte[$p->id] = $p->pivot->qte;
        $total += $p->prix * $qte[$p->id];
    }
    return view('Détail', ['pizza' => $pizza, 'qte' => $qte, 'id' => $request->id, 'type' => Auth::user()->type, 'total' => $total]);
}


    public function commandes(Request $request){
    $user = Auth::user();
    $commandes = Commande::where('user_id',$user->id)->paginate(5);
    return view('Commandes',['commandes'=>$commandes]);
    }

    public function allCommandes(Request $request){
        $commandes = Commande::Paginate(5);
        return view('Commandes',['commandes'=>$commandes,'type'=>Auth::user()->type]);
    }

    public function commandeForm(Request $request){
        return view('RechercheDate');
    }

    public function commandeDate(Request $request){
            $commandes = Commande::whereDay('created_at',$request->jour)
            ->whereMonth('created_at',$request->mois)->whereYear('created_at',$request->année)->get();
            return view('Commandes',['commandes'=>$commandes,'type'=>Auth::user()->type,'noPaginate'=>true]);
    }

   public function triCommande(Request $request) {
    $commandes = Commande::whereDate('created_at', now()->toDateString())
                  ->orderBy('statut')
                  ->orderBy('created_at')
                  ->paginate(5); 
    
    return view('CommandeJour', ['commandes' => $commandes]);
    }
     
   public function recetteDuJour()
{
    $today = now()->toDateString();
    $commandes = Commande::whereDate('created_at', $today)->get();
    $totals = [];
    $totalRecette = 0;
    foreach ($commandes as $commande) {
        $totalCommande = 0;
        $pizzas = $commande->pizza()->get();
        foreach ($pizzas as $pizza) {
            $totalCommande += $pizza->prix * $pizza->pivot->qte;
        }
        $totals[$commande->id] = $totalCommande;
        $totalRecette += $totalCommande;
    }
    return view('Recette', ['commandes' => $commandes, 'totals' => $totals, 'totalRecette' => $totalRecette]);
}



}