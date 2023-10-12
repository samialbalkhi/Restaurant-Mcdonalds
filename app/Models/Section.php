<?php

namespace App\Models;

use App\Models\Career;
use App\Models\Family;
use App\Models\MyCafe;
use App\Models\Category;
use App\Models\Ourrestaurant;
use App\Models\Ourresponsibility;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Section extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function status()
    {
        return $this->status ? 'Active' : 'Anactive';
    }

    public function categories()
    {
        return $this->hasMany(Category::class);
    }
    public function OurResponsibility()
    {
        return $this->hasMany(Ourresponsibility::class);
    }

    public function mycafes()
    {
        return $this->hasMany(MyCafe::class);
    }

    public function families()
    {
        return $this->hasMany(Family::class);
    }
    public function ourrestaurants()
    {
        return $this->hasMany(Ourrestaurant::class);
    }

    public function careers()
    {
        return $this->hasMany(Career::class);
    }
}
