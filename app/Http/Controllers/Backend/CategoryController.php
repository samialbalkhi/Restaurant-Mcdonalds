<?php

namespace App\Http\Controllers\Backend;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Service\Backend\CategoryService;
use App\Http\Requests\Backend\CategoryRequest;

class CategoryController extends Controller
{

    private $CategoryService;

    public function __construct(CategoryService $CategoryService)
    {
        $this->CategoryService = $CategoryService;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return response()->json(
            $this->CategoryService->index());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CategoryRequest $request)
    {
        return response()->json(
            $this->CategoryService->store($request),201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        return response()->json(
            $this->CategoryService->edit($category));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CategoryRequest $request, Category $category)
    {
        $this->CategoryService->update($request, $category);
        return response()->json(['messge' => 'Updateed successfully']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        $this->CategoryService->destroy($category);
        return response()->json(['message' => 'Deleted successfully'], 202);
    }
}