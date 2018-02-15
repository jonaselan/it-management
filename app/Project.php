<?php

namespace itmanagement;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $fillable = [
        'client_id', 'name'
    ];

    public function client(){
        return $this->belongsTo(Client::class);
    }

    public function created_at_ptbr(){
        return $this->created_at->format('d-m-Y');
    }
}
