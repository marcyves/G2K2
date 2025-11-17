<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

    
        \App\Models\User::factory()->create([
            'name' => 'John Doe',
            'email' => 'john@doe.com',
            'password' => bcrypt('topsecret'),
        ]);
        


        \App\Models\Group::factory()->create([
            'name' => 'Groupe 1',
            'description' => 'Description du groupe 1',
            'slug' => 'groupe-1',
        ]);

        \App\Models\Group::factory()->create([
            'name' => 'Groupe 2',
            'description' => 'Description du groupe 2',
            'slug' => 'groupe-2',
        ]);
        \App\Models\Group::factory()->create([
            'name' => 'Groupe 3',
            'description' => 'Description du groupe 3',
            'slug' => 'groupe-3',
        ]);
        \App\Models\Group::factory()->create([
            'name' => 'Groupe 4',
            'description' => 'Description du groupe 4',
            'slug' => 'groupe-4',
        ]);
        \App\Models\Group::factory()->create([
            'name' => 'Groupe 5',
            'description' => 'Description du groupe 5',
            'slug' => 'groupe-5',
        ]);
        \App\Models\Group::factory()->create([
            'name' => 'Groupe 6',
            'description' => 'Description du groupe 6',
            'slug' => 'groupe-6',
        ]);
        \App\Models\Group::factory()->create([
            'name' => 'Groupe 7',
            'description' => 'Description du groupe 7',
            'slug' => 'groupe-7',
        ]);
        \App\Models\Group::factory()->create([
            'name' => 'Groupe 8',
            'description' => 'Description du groupe 8',
            'slug' => 'groupe-8',
        ]);


    }
}
