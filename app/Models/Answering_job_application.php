<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Answering_job_application extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function EmploymentApplication()
    {
        return $this->belongsTo(EmploymentApplication::class, 'employment_application_id');
    }
}
