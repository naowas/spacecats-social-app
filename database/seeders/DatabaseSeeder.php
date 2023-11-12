<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Like;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Spatie\MediaLibrary\MediaCollections\Exceptions\FileCannotBeAdded;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

       User::factory(30)->create()
          ->each(function(User $user) {
              $user->addMediaFromUrl(fake()->imageUrl(400,400))->toMediaCollection('display_image');
          });

        User::factory()->create([
            'name' => 'John Doe',
            'phone' => '01521300848',
            'email' => 'user@mail.com',
            'gender' => 1,
            'email_verified_at' => now(),
            'password' => Hash::make('password'),
            'remember_token' => Str::random(10),
        ]);

//       Like::factory(50)->create();

    }
}
