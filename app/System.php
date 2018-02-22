<?php

namespace itmanagement;

use Illuminate\Database\Eloquent\Model;

class System extends Model
{
    protected $fillable = [
        'project_id', 'name', 'description', 'type'
    ];

    public function project(){
        return $this->belongsTo(Project::class);
    }
}
