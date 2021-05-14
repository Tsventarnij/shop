<?php
namespace App\Builder;

use App\Models\MediaType;
use App\Models\ProductMedia as ProductMediaModel;
use Illuminate\Database\Eloquent\Model;

class ProductMedia
{
    const IMAGE_EXTENSION = [
        'jpg', 'jpeg', 'png'
    ];

    const VIDEO_EXTENSION = [
        'mp4'
    ];

    const VIEW_EXTENSION = [

    ];

    const AVAILABLE_TYPES = [
        MediaType::IMAGE => self::IMAGE_EXTENSION,
        MediaType::VIDEO => self::VIDEO_EXTENSION,
    ];

    /**
     * @var \App\Models\ProductMedia
     */
    private $media;

    public function __construct(int $productId)
    {
        $this->media = new ProductMediaModel();
        $this->media->product_id = $productId;
    }

    public function create($extension, $filePath)
    {
        foreach (self::AVAILABLE_TYPES as $type => $extensions){
            if (in_array($extension, $extensions)) {
                $this->media->media_type_id = $type;
                break;
            }
        }
        $this->media->url = $filePath;
        $this->media->save();
    }

}