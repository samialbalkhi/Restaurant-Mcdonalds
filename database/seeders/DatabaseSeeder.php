<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use Database\Seeders\JobSeeder;
use Illuminate\Database\Seeder;
use Database\Seeders\CareerSeeder;
use Database\Seeders\DetailSeeder;
use Database\Seeders\FamilySeeder;
use Database\Seeders\MyCafeSeeder;
use Database\Seeders\EntrustSeeder;
use Database\Seeders\ProductSeeder;
use Database\Seeders\SectionSeeder;
use Database\Seeders\CategorySeeder;
use Database\Seeders\JobOfferSeeder;
use Database\Seeders\OurrestaurantSeeder;
use Database\Seeders\ProductReviewSeeder;
use Database\Seeders\OurresponsibilitySeeder;
use Database\Seeders\EmploymentApplicationSeeder;
use Database\Seeders\EmploymentOpportunitySeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(SectionSeeder::class);
        $this->call(EntrustSeeder::class);
        $this->call(CategorySeeder::class);
        $this->call(ProductSeeder::class);
        $this->call(MyCafeSeeder::class);
        $this->call(FamilySeeder::class);
        $this->call(OurresponsibilitySeeder::class);
        $this->call(OurrestaurantSeeder::class);
        $this->call(CareerSeeder::class);
        $this->call(EmploymentOpportunitySeeder::class);
        $this->call(JobOfferSeeder::class);
        $this->call(DetailSeeder::class);
        $this->call(EmploymentApplicationSeeder::class);
        $this->call(ProductReviewSeeder::class);

        
    }
}
