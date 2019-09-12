<?php

namespace App\ImageFilters\Post;

use Intervention\Image\Image;
use Intervention\Image\Filters\FilterInterface;

class Large implements FilterInterface 
{
    public function applyFilter(Image $image)
    {
        return $image->resize(1200, null, function ($constraint) {
            $constraint->upsize();
            $constraint->aspectRatio();
        });
    }
}

