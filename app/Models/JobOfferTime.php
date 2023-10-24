<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Joboffer;

class JobOfferTime extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $table = 'job_offer_times';
    public function Joboffer()
    {
        return $this->belongsTo(Joboffer::class);
    }
}
