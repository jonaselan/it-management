<?php

namespace itmanagement;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    public function clients(){
        return $this->hasMany(Contract::class);
    }

    public function users(){
        return $this->hasMany(User::class);
    }

}
