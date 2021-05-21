<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ProductTypes extends Model
{
    use HasFactory;

    public function value(): BelongsTo
    {
        return $this->belongsTo(TypeValues::class, 'type_value_id', 'id')->with('type');
    }
}
