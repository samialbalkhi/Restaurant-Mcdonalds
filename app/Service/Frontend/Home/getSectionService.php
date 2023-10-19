<?php
namespace App\Service\Frontend\Home;

use App\Models\Section;

class getSectionService
{
    public function getSection()
    {
        return Section::Active()->get();
    }
}
