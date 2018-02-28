<?php

namespace itmanagement;

use Illuminate\Database\Eloquent\Model;

class Logo extends Model
{
    protected $fillable = [
        'name', 'path', 'uploadable_id', 'uploadable_type'
    ];

    /**
     * Get all of the owning uploadable models.
     */
    public function uploadable()
    {
        return $this->morphTo();
    }
}
