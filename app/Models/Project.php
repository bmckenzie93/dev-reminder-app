<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class Project extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'steps'
    ];

    public function customSteps()
    {
        return $this->belongsToMany(Step::class, 'project_step');
    }

        // Get all steps (default + custom)
    public function getAllSteps()
    {
        $defaultSteps = Step::where('is_default', true)->get(); // Get default steps
        $customSteps = $this->customSteps; // Get custom steps for this project

        return $defaultSteps->merge($customSteps); // Merge them together
    }

    public function steps()
    {
        return $this->hasMany(Step::class);
    }

    public function scopeName(Builder $query, string $name): Builder
    {
        return $query->where('name', 'LIKE', '%' . $name . '%');
    }
}
