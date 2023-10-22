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

    public function store(CareerRequest $request)
    {
        $section = Section::find($request->section_id);
        $path = $this->storeImage('image_career');

        $career = $section->careers()->create([
            'title' => $request->title,
            'description' => $request->description,
            'image' => $path,
        ]);

        return $career;
    }

    public function edit(Career $career)
    {
        return $career->find($career->id);
    }

    public function update(CareerRequest $request, Career $career)
    {
        $this->deleteImage($career);
        $path = $this->storeImage('image_career');

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
