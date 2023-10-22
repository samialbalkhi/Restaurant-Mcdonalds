<?php

namespace App\Models;

use App\Models\Job_offer;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class EmploymentOpportunity extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function Job_offers()
    {
        return $this->hasMany(Job_offer::class);
    }
  
}
