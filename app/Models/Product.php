<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'price',
        'category_id',
    ];

    public function company(): BelongsTo
    {
        return $this->belongsTo(Company::class);
    }

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function media(): HasMany
    {
        return $this->hasMany(ProductMedia::class, 'product_id', 'id');
    }

    public function mainImage(): HasOne
    {
        return $this->hasOne(ProductMedia::class, 'product_id', 'id')
            ->where('media_type_id', MediaType::IMAGE)->oldest();
    }

    public function properties(): HasMany
    {
        return $this->hasMany(ProductTypes::class, 'product_id', 'id')
            ->with('value');
    }
}
