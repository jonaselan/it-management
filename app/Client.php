<?php

namespace itmanagement;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    protected $fillable = [
        'name', 'phone', 'address', 'cnpj'
    ];

    public function contracts(){
        return $this->hasMany(Contract::class);
    }

    public function users(){
        return $this->hasMany(User::class);
    }

    public function projects(){
        return $this->hasMany(Project::class);
    }

}
