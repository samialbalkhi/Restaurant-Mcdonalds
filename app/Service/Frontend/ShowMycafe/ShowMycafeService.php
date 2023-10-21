<?php
namespace App\Service\Frontend\ShowMycafe;
use App\Models\MyCafe;
use App\Models\Section;

class ShowMycafeService
{
    public function ShowSectioMycafe(Section $section)
    {
        return Section::with('mycafes')
            ->where('id', $section->id)
            ->get();
    }
}
