<?php

namespace Database\Seeders;

use Faker\Factory;
use App\Models\WorkTime;
use GuzzleHttp\Promise\Create;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class WorkTimeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $values = ['Mini job', 'Part time', 'fulltime'];

        foreach ($values as $value) {
            DB::table('work_times')->insert([
                'name' => $value,
            ]);
        }
    }
}
