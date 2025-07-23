<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pet extends Model
{
    use HasFactory;

    protected $fillable = [
        'breed_id',
        'name',
        'age',
        'color',
        'size',
        'gender',
        'description',
        'activity_level',
        'images_folder',
        'status',
        'type',
    ];

    public function scopeSearch($query, $name = null, $color = null)
    {
        if ($name) {
            $query->where('name', 'like', "%{$name}%");
        }

        if ($color !== null) {
            $query->where('color', 'like', "%{$color}%");
        }

        return $query;
    }

    public function breed()
    {
        return $this->belongsTo(Breed::class);
    }

    public function applications()
    {
        return $this->hasMany(Application::class);
    }
}
