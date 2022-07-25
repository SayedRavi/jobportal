<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Company;
use App\Models\Job;
use App\Models\User;
use Database\Factories\app\CompanyFactory;
use Database\Factories\app\JobsFactory;
use Database\Factories\UserFactory;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::factory(8)->create();
        Job::factory(8)->create();
        Company::factory(8)->create();
//        $categories = [
//            'Government','NGO', 'Banking', 'Software', 'Networking', '2ndOption'
//        ];
//        foreach ($categories as $category){
//            Category::create([
//                'name'=> $category
//            ]);
//        }

//         \App\Models\User::factory(20)->create();
//        $this->call(JobsSeeder::class);
//         \App\Models\Company::factory(20)->create();
//         \App\Models\Job::factory(20)->create();
    }
}
