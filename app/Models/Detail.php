<?php

namespace App\Models;
use App\Models\Job_offer;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Detail extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function Job_offer()
    {
        return $this->belongsTo(Job_offer::class);
    }
}
