<?php
namespace App\Factories\ProductMediaView;

use App\Models\MediaType;
use Illuminate\Support\Facades\Log;

class Factory
{
    public function get(int $type)
    {
        switch ($type) {
            case MediaType::IMAGE:
                return new Image();
            case MediaType::VIDEO:
                return new Video();
        }
        return new None();
    }
}