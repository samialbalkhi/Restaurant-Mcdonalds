<?php
namespace App\Service\Frontend\ShowOurResponsibiliy;

use App\Models\Section;

class ShowOurResponsibiliyService
{
    public function ShowOurResponsibiliy(Section $section)
    {
        return Section::with('OurResponsibility')->where('id',$section->id)->get();
    }
}
?>
