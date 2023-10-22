<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Job_offer;

class JobOfferTime extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function job_offer()
    {
        return $this->belongsTo(Job_offer::class);
    }
}
