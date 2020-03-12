<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Form extends Model
{
    protected $fillable = [
        'name', 'description', 'template'
    ];

    public function project()
    {
        return $this->belongsTo(Project::class);
    }
}
