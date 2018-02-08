<?php

namespace itmanagement;

use Illuminate\Database\Eloquent\Model;

class Contract extends Model
{
    public function clients(){
        return $this->belongsTo(Client::class);
    }

}
