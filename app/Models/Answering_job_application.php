<?php

namespace App\Models;

use App\Models\Employment_application;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Answering_job_application extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function employment_application()
    {
        return $this->belongsTo(Employment_application::class, 'employment_application_id');
    }
}
