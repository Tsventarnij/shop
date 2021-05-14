<?php
namespace App\Factories\ProductMediaView;

class None implements ProductMediaView
{
    public function draw(string $data, string $title = null): string
    {
        return '';
    }
}