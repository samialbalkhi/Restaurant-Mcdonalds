<?php
namespace App\Service\Backend;

use App\Models\Section;
use App\Traits\ImageUploadTrait;
use App\Http\Requests\Backend\SectionRequest;

class SectionService
{
    use ImageUploadTrait;

    public function index()
    {
        return Section::all();
    }

    public function store(SectionRequest $request): Section
    {
        return Section::create(['image' => $this->uploadImage('images_section'),
         'status' => $request->filled('status')]
          + $request->validated());
    }

    public function edit(Section $section)
    {
        return $section;
    }

    public function update(SectionRequest $request, Section $section)
    {
        $this->updateImage($section);
        
        $section->update(['image' => $this->uploadImage('images_section'),
         'status' => $request->filled('status')
         ] + $request->validated());
    }

    public function destroy(Section $section)
    {
        $this->deleteImage($section);

        $section->delete();
    }
}
