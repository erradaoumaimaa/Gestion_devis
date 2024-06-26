<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'price',
        'image',
        'categorie_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function category()
    {
        return $this->belongsTo(Category::class, 'categorie_id');
    }
    public function scopeFilter($query, array $filters) {

        $query->when($filters['q'] ?? false,
            fn($query, $q) => $query->where('name', 'LIKE', '%' . $q . '%')
        );

        $query->when($filters['category'] ?? false,
            fn($query, $category) => $query->whereHas('category', fn($query) => $query->where('id', $category))
        );
    }
    public function devis()
    {
        return $this->belongsToMany(Devis::class);
    }
}
