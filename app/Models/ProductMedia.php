<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class ProductMedia extends Model
{
    use HasFactory;

    protected $table = 'products_media';

    public function getUrlAttribute($value)
    {
        return Storage::url($value);
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
