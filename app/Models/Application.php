<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Application extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'pet_id',
        'reason',
        'whom',
        'children_present',
        'other_pets',
        'family_favor',
        'family_allergy',
        'financer',
        'carer',
        'building_type',
        'residence_policies',
        'pet_place',
        'litterbox_place',
        'prepared_odour',
        'selfie',
        'appointment_date',
    ];

    public function scopeSearch($query, $value)
    {
        $query->whereHas('user', function ($query) use ($value) {
            $query->where('name', 'like', "%{$value}%");
        })->orWhereHas('pet', function ($query) use ($value) {
            $query->where('name', 'like', "%{$value}%");
        });

        return $query;
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function pet()
    {
        return $this->belongsTo(Pet::class);
    }

    public function getAppointmentDateAttribute($value)
    {
        return $value ? Carbon::parse($value)->format('F j, Y h:i a') : null;
    }
}
