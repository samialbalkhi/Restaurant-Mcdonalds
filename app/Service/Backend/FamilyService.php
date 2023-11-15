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
        $path = $this->uploadImage('image_family');
        $section = Section::find($request->section_id);

        return $section->families()->create([
            'name' => $request->name,
            'title' => $request->title,
            'description' => $request->description,
            'image' => $path,
        ]);
    }

    public function edit(Family $family)
    {
        return $family->find($family->id);
    }

    public function update(FamilyRequest $request, Family $family)
    {
        $this->updateImage($family);
        $path = $this->uploadImage('image_family');

        $family->update([
            'name' => $request->name,
            'title' => $request->title,
            'description' => $request->description,
            'image' => $path,
            'section_id' => $request->section_id,
        ]);
    }

    public function destroy(Family $family)
    {
        $this->deleteImage($family);
        $family->delete();
    }
}
