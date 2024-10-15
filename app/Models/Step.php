<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Step extends Model
{

    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'info',
        'options',
        'step_number',
        'is_default'
    ];

    protected $casts = [ // Automatically cast JSON to an array
        'info' => 'array', 
        'options' => 'array',
    ];

    public function projects() {
        return $this->belongsToMany(Project::class, 'project_step');
    }
    
    public function project()
    {
        return $this->belongsTo(Project::class);
    }
}
