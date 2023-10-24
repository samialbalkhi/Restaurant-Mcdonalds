<?php

namespace App\Models;

use App\Models\Detail;
use App\Models\JobOfferTime;
use App\Models\EmploymentOpportunity;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Joboffer extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function employment_opportunitie()
    {
        return $this->belongsTo(EmploymentOpportunity::class, 'employment_opportunity_id');
    }

    public function details()
    {
        return $this->hasMany(Detail::class);
    }

    public function jobOfferTimes()
    {
        return $this->hasMany(JobOfferTime::class);
    }
}
