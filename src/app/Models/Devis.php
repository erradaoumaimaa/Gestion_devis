<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Devis extends Model
{
    protected $fillable = [
        'user_id', 'total_ht', 'tva', 'reduction', 'total_ttc', 'description'
    ];

    public function getCreatedAtAttribute()
    {
        return  Carbon::parse($this->attributes['created_at'])->format('d/m/Y');
    }

    public function scopeFilter($query, array $filters) {

        $query->when($filters['q'] ?? false,
            fn($query, $q) => $query->whereHas('user', fn($query) => $query->where('name', 'LIKE', '%' . $q . '%'))
                                    ->orWhereHas('services', fn($query) => $query->where('name', 'LIKE', '%' . $q . '%'))
        );
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function facture()
    {
        return $this->hasOne(Facture::class);
    }

    public function services()
    {
        return $this->belongsToMany(Service::class);
    }
}

