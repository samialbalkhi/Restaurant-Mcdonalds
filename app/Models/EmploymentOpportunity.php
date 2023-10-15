<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmploymentOpportunity extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function Job_offers()
    {
        return $this->hasMany(Job_offer::class);
        
    }
}
