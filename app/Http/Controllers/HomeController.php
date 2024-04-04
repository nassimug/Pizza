<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pizza;
use App\Models\Commande;
use Illuminate\Support\Facades\Auth;

class homeController extends Controller
{
    public function Home(){
        $info = Pizza::paginate(3);
        if (Auth::check()) {
            $user = Auth::user();
            $type = $user->type;
            if ($type == 'cook') {
                return redirect()->route('cook');
            }
            return view('Home', ['pizza'=>$info,'type'=>$type]);
        }
        
        return view('Home', ['pizza'=>$info]);
    }

    public function CookHome()
    {
        
        $commandes = Commande::whereIn('statut', ['pret', 'traitement', 'envoye'])
                            ->whereNotIn('statut', ['recupere', 'livree', 'annulee'])
                            ->paginate(10);
        
        return view('cook', ['commandes' => $commandes]);
    }


}
