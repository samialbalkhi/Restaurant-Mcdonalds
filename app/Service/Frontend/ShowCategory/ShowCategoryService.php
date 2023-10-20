<?php

namespace App\Service\Frontend\ShowCategory;

use App\Models\Category;

class ShowCategoryService
{
    public function getCategory(Category $category)
    {
        return Category::where('section_id', $category->id)->get();
    }

}
