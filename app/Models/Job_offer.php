<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Job_offer extends Model
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
}
