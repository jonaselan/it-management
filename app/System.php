<?php

namespace itmanagement;

use Illuminate\Database\Eloquent\Model;

class System extends Model
{
    public function project(){
        return $this->belongsTo(Project::class);
    }
}
