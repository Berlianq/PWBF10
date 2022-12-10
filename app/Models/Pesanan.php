<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pesanan extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function scopeFilters(Builder $query, array $filters)
    {
        $query->when($filters['q'] ?? null, function (Builder $query, $search) {
            $query
                ->where('keterangan', 'LIKE', "%" . $search . "%")
                ->orWhere('bayar', 'LIKE', "%" . $search . "%");
        });
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function pesananDetails()
    {
        return $this->hasMany(PesananDetail::class);
    }
}
