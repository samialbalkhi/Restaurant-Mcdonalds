<?php
namespace App\Service\Backend;

use App\Models\Career;
use App\Models\Section;
use App\Traits\ImageUploadTrait;
use App\Http\Requests\Backend\CareerRequest;

class CareerService
{
    use ImageUploadTrait;

    public function index()
    {
        return Career::with(['section:id,name'])->get();
    }

    public function store(CareerRequest $request) : Career
    {
        $section = Section::find($request->section_id);
        $path = $this->uploadImage('image_career');

        return  $section->careers()->create([
            'title' => $request->title,
            'description' => $request->description,
            'image' => $path,
        ]);

         
    }

    public function edit(Career $career)
    {
        return $career;
    }

    public function update(CareerRequest $request, Career $career)
    {
        $this->updateImage($career);
        $path = $this->uploadImage('image_career');

        $career->update([
            'title' => $request->title,
            'description' => $request->description,
            'image' => $path,
            'section_id' => $request->section_id,
        ]);
    }

    public function destroy(Career $career)
    {
        $this->deleteImage($career);
        $career->delete();
    }
}
