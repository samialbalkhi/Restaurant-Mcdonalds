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
        return 
            MyCafe::with(['section:id,name'])->get();
    }

    public function store(MycafeRequest $request) : MyCafe
    {
        $section = Section::find($request->section_id);
        $path = $this->storeImage('image_mycafe');

        return $section->mycafes()->create([
            'name' => $request->name,
            'description' => $request->description,
            'image' => $path,
        ]);

    }

    public function edit(MyCafe $mycafe)
    {
        return
            $mycafe->find($mycafe->id);
    }

    public function update(MycafeRequest $request, MyCafe $mycafe)
    {
        $this->deleteImage($mycafe);

        $path = $this->storeImage('image_mycafe');

        $mycafe->update([
            'name' => $request->name,
            'description' => $request->description,
            'image' => $path,
            'section_id' => $request->section_id,
        ]);

    }

    public function destroy(MyCafe $mycafe)
    {
        $this->deleteImage($mycafe);

        $mycafe->delete();

    }
}
