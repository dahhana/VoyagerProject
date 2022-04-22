<?php

namespace App;
use \Auth;

use Illuminate\Database\Eloquent\Model;
class Professeur extends Model
{
    public function scopeProfs($query)
    {
        if (Auth::user()->role_id == 6)
        {
            return $query->where('id_user', '=', Auth::user()->id);
        }
        
    }
    
}
