<?php

namespace Database\Seeders;

use App\Models\Book;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();
        
        User::factory(10)->create();
        Book::factory(20)->create();

  

        // Get all the book 
        $books = Book::all();

        // Populate the pivot table
        User::all()->each(function ($user) use ($books) { 
            $booksToAttach = $books->random(rand(1, 2));

            $booksToAttach->each(function($book) use ($user) {
                $start_date = now()->addDays(rand(1, 30))->format('Y-m-d');
                $end_date = now()->addDays(rand(1, 30))->format('Y-m-d');
                
                $user->book()->attach($book->id, ['start_date' => $start_date, 'end_date' => $end_date]);
            });
        });
    }
}
