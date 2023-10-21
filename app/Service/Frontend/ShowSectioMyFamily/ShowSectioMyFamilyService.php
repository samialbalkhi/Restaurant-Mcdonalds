<?php
namespace App\Service\Frontend\ShowSectioMyFamily;

use App\Models\Section;

class ShowSectioMyFamilyService
{
    public function ShowSectioMyFamily(Section $section){

        return Section::with('families')
        ->where('id', $section->id)
        ->get();
    }
}
