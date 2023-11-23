<?php
namespace App\Service\Backend;

use App\Models\Family;
use App\Models\Section;
use App\Traits\ImageUploadTrait;
use App\Http\Requests\Backend\FamilyRequest;

class FamilyService
{
    use ImageUploadTrait;

    public function index()
    {
        return Family::with(['section:id,name'])->get();
    }

    public function store(FamilyRequest $request): Family
    {
        $section = Section::find($request->section_id);
        
        return $section->families()->create([
            'image' => $this->uploadImage('image_family')] 
            + $request->validated());
    }

    public function edit(Family $family)
    {
        return $family;
    }

    public function update(FamilyRequest $request, Family $family)
    {
        $this->updateImage($family);

        $family->update([
            'image' => $this->uploadImage('image_family')] 
            + $request->validated());
    }

    public function destroy(Family $family)
    {
        $this->deleteImage($family);
        $family->delete();
    }
}
