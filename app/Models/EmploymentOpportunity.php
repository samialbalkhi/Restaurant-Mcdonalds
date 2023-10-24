<?php

namespace App\Models;

use App\Models\Joboffer;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class EmploymentOpportunity extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function Joboffers()
    {
        return $this->hasMany(Joboffer::class);
    }
  
}
