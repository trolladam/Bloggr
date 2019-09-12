<?php

namespace App\ImageFilters\Post;

use Intervention\Image\Image;
use Intervention\Image\Filters\FilterInterface;

class Medium implements FilterInterface 
{
    public function applyFilter(Image $image)
    {
        return $image->fit(800, 240);
    }
}

