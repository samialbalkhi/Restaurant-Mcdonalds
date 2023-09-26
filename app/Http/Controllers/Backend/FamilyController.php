<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Family;
use Illuminate\Http\Request;

class FamilyController extends Controller
{
    public function index()
    {
        $Family = Family::with(['section:id,name'])->get();

        $respones = [
            'Family' => $Family,
        ];
    }

    public function store()
    {
        
    }
}
