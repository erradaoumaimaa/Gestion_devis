<?php

namespace App\Models;

use App\Models\Service;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $fillable = [
        'name',
        'email',
        'password',
        'image',
        'ice',
        'role',
        'ville',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function setPasswordAttribute($password)
    {
        $this->attributes['password'] = bcrypt($password);
    }

    public function getCreatedAtAttribute()
    {
        return  Carbon::parse($this->attributes['created_at'])->toDayDateTimeString();
    }

    public function scopeFilter($query, array $filters) {

        $query->when($filters['q'] ?? false,
            fn($query, $q) => $query->where('name', 'LIKE', '%' . $q . '%')->orWhere('ice', 'LIKE', '%' . $q . '%')
        );
    }

    public function services()
    {
        return $this->hasMany(Service::class);
    }

    public function devis()
    {
        return $this->hasMany(Devis::class);
    }


}
