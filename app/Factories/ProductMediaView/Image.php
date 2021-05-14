<?php
namespace App\Factories\ProductMediaView;

class Image implements ProductMediaView
{
    public function draw(string $data, string $title = null): string
    {
        return view('product/media/image', [
            'url' => $data,
            'title' => $title
        ]);
    }
}