<?php
namespace App\Service\Backend;

use App\Models\Section;
use App\Traits\ImageUploadTrait;
use App\Models\Ourresponsibility;
use App\Http\Requests\Backend\OurResponsibilityRequest;

class ourResponsibilityService
{
    use ImageUploadTrait;

    public function index()
    {
        return Ourresponsibility::with(['section:id,name'])->get();
    }

    public function store(OurResponsibilityRequest $request): Ourresponsibility
    {
        $path = $this->uploadImage('images_OurResponsibility');

        $section = Section::find($request->section_id);

        return $section->OurResponsibility()->create([
            'title' => $request->title,
            'description' => $request->description,
            'image' => $path,
            'section_id' => $request->section_id,
        ]);
    }

    public function edit(Ourresponsibility $ourResponsibility)
    {
        return $ourResponsibility->find($ourResponsibility->id);
    }

    public function update(OurResponsibilityRequest $request, Ourresponsibility $ourResponsibility)
    {
        $this->updateImage($ourResponsibility);

        $path = $this->uploadImage('images_ourResponsibility');

        $ourResponsibility->update([
            'title' => $request->title,
            'description' => $request->description,
            'image' => $path,
            'section_id' => $request->section_id,
        ]);
    }

    public function destroy(Ourresponsibility $ourResponsibility)
    {
        $this->deleteImage($ourResponsibility);

        $ourResponsibility->delete();
    }
}
