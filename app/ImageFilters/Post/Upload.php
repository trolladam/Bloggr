<?php

namespace App\ImageFilters\Post;

use Intervention\Image\Image;
use Intervention\Image\Filters\FilterInterface;

class Upload implements FilterInterface 
{
    public function applyFilter(Image $image)
    {
        return $image->resize(2500, null, function ($constraint) {
            $constraint->upsize();
            $constraint->aspectRatio();
        })->encode('jpg', 100);
    }
}
