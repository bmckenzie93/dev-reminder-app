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
        'stepNum',
    ];

    protected $casts = [ // Automatically cast JSON to an array
        'info' => 'array', 
        'options' => 'array',
    ];

    public function project()
    {
        return $this->belongsTo(Project::class);
    }
}
