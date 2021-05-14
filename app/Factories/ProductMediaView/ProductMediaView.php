<?php
namespace App\Factories\ProductMediaView;

interface ProductMediaView
{
    public function draw(string $data, string $title = null):string;
}