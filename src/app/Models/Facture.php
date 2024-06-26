<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Facture extends Model
{
    use HasFactory;

    protected $fillable = [
        'devis_id',
    ];

    public function getCreatedAtAttribute()
    {
        return  Carbon::parse($this->attributes['created_at'])->format('d/m/Y');
    }

    public function devis()
    {
        return $this->belongsTo(Devis::class);
    }
}
