<?php
namespace App\Service\Frontend\DeliverySection;

use App\Models\Category;

class ShowAllCategoryService
{
    public function index()
    {
        return Category::get(['id', 'name', 'section_id']);
    }
}
