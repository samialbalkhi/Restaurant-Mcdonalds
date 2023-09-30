<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Job_offer;

class Job extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function Job_offers()
    {
        return $this->hasMany(Job_offer::class);
        
    }
}
