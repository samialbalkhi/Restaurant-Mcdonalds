<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use Illuminate\Database\Seeder;
use Database\Seeders\WorkTimeSeeder;
use Database\Seeders\JobOfferTimeSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(SectionSeeder::class);
        $this->call(UesrSeeder::class);
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
        $this->call(AnsweringJobApplicationsSeeder::class);
        $this->call(WorkTimeSeeder::class);
        $this->call(JobOfferTimeSeeder::class);

        

        
        
    }
}
