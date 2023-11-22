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
        //   return  Section::create($request->validated() + [
        //         'image' => $this->uploadImage('images_section'),

        //     ]);
        return Section::create([
            'name' => $request->name,
            'description' => $request->description,
            'message' => $request->message,
            'status' => $request->filled('status'),
            'image' => $this->uploadImage('images_section'),
        ]);
    }

    public function edit(Section $section)
    {
        return $section;
    }

    public function update(SectionRequest $request, Section $section)
    {
        $this->updateImage($section);
        $path = $this->uploadImage('images_section');

        $section->update([
            'name' => $request->name,
            'description' => $request->description,
            'message' => $request->message,
            'status' => $request->filled('status'),
            'image' => $path,
        ]);
    }

    public function destroy(Section $section)
    {
        $this->deleteImage($section);

        $section->delete();
    }
}
