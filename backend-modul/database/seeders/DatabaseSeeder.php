<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Avaible_position;
use App\Models\job_categories;
use App\Models\job_category;
use App\Models\Jobs_vacancy;
use App\Models\Regionals;
use App\Models\Societies;
use App\Models\User;
use App\Models\Validators;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        Regionals::create([
            'province' => 'jakarta',
            'district' => 'jakarta timur',
        ]);

        $reg_id = Regionals::where('district' , 'jakarta timur')->first()->id;

        Societies::create([
            'id_card_number' => '12345678',
            'password' => '12345',
            'name' => 'salsm',
            'born_date' => '2001-02-03',
            'gender' => 'female',
            'address' =>'jalanjalanan',
            'regional_id' => $reg_id,
            'login_tokens' => null,
        ]);

        job_categories::create([
            'job_category' => 'programmer'
        ]);

        User::create([
            'name' => 'salman',
            'email' => 'fikri0078@gmail.com',
            'password' => '123'
        ]);


        Validators::create([
            'user_id' => 1,
            'role' => 'validator',
            'name' => 'salman',
        ]);

        Jobs_vacancy::create([
            'job_category_id' => 1,
            'company' => 'salman TBk',
            'address' => 'jl sinar jaya',
            'description' => 'punya salman',
        ]);

        Avaible_position::create([
            'job_vacancy_id' => 1 ,
            'position' => 'frontend',
            'capacity' => 6,
            'apply_capacity' => 2,
        ]);
        
        Avaible_position::create([
            'job_vacancy_id' => 1 ,
            'position' => 'backend',
            'capacity' => 12,
            'apply_capacity' => 23,
        ]);






    }
}
