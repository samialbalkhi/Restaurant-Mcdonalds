<?php
namespace App\Service\Backend;

use App\Models\MyCafe;
use App\Models\Section;
use App\Traits\ImageUploadTrait;
use App\Http\Requests\Backend\MycafeRequest;

class MycafeService
{
    use ImageUploadTrait;

    public function index()
    {
        return MyCafe::with(['section:id,name'])->get();
    }

    public function store(MycafeRequest $request): MyCafe
    {
        $section = Section::find($request->section_id);

        return $section->mycafes()->create([
            'name' => $request->name,
            'description' => $request->description,
            'image' => $this->uploadImage('image_mycafe'),
        ]);
    }

    public function edit(MyCafe $mycafe)
    {
        return $mycafe;
    }

    public function update(MycafeRequest $request, MyCafe $mycafe)
    {
        $this->updateImage($mycafe);

        $mycafe->update([
            'name' => $request->name,
            'description' => $request->description,
            'image' => $this->uploadImage('image_mycafe'),
            'section_id' => $request->section_id,
        ]);
    }

    public function destroy(MyCafe $mycafe)
    {
        $this->deleteImage($mycafe);

        $mycafe->delete();
    }
}
