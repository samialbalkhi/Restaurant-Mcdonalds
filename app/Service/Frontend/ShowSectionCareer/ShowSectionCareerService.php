<?php
namespace App\Service\Frontend\ShowSectionCareer;

use App\Models\Section;

class ShowSectionCareerService
{
    public function ShowSectionCareer(Section $section)
    {
        return Section::with('careers')
            ->where('id', $section->id)
            ->get();
    }
}
