<?php

namespace App\Models;

use App\Models\Worktime;
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
    public function worktimes()
{
    return $this->hasMany(Worktime::class);
}
}
