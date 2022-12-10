<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Food extends Model
{
    use HasFactory;

    protected $guarded = ['id'];
    protected $table = "foods";


    public function scopeFilters(Builder $query, array $filters)
    {
        $query->when(
            $filters['category'] ?? null,
            fn (Builder $query, $category) =>
            $query->where('category', $category)
        );

        $query->when($filters['q'] ?? null, function (Builder $query, $search) {
            $query
                ->where('name', 'LIKE', "%" . $search . "%")
                // ->orWhere('category', 'LIKE', "%" . $search . "%")
                ->orWhere('stock', 'LIKE', "%" . $search . "%")
                ->orWhere('price', 'LIKE', "%" . $search . "%");
        });
    }
}
