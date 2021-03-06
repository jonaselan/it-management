<?php

namespace itmanagement;

use Illuminate\Database\Eloquent\Model;

class Contract extends Model
{
    protected $fillable = [
        'client_id', 'object', 'validity', 'value', 'payment'
    ];

    public function client(){
        return $this->belongsTo(Client::class);
    }

    public function validity_ptbr(){
        return date('d-m-Y', strtotime($this->validity));
    }

}
