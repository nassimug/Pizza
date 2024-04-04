<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasFactory;

    public $timestamps = false;
    protected $hidden = ['mdp'];
    protected $fillable = ['login', 'mdp', 'nom','prenom'];
    protected $attributes = [ 'type' => 'user' ];

    public function getAuthPassword(){
        return $this->mdp;
    }        

    function commande(){
        return $this->hasMany(Commande::class, 'user_id');
    }

    public function isAdmin(){
        return $this->type == 'admin';
    }
    
}
