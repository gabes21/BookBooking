<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\BookUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BookUserController extends Controller
{
    // Store Booking Records
    public function store(Request $request, Book $book){
        // Make sure logged in user is owner
        // Validate data
        $validator = $request->validate([
            'start_date' => ['required','date'],
            'end_date' => ['required', 'date', 'after_or_equal:start_date'],
        ]);

        try {
            // Create the booking
            $booking = BookUser::create([
                'user_id' => auth()->id(),
                'book_id' => $book->id,
                'start_date' => $request->start_date,
                'end_date' => $request->end_date,
            ]);

            return redirect('/')->with('message', 'Booking created successfully');

        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Failed to create booking: ' . $e->getMessage());
        }
    }

    // Manage Booking
    public function manage() {
        $books = Auth::user()->book()
            ->whereNull('returned_at')
            ->whereNull('pickedup_at')
            ->get();
        return view('manage', ['books' => $books]);
    }

    // Delete Booking
    public function destroy(Book $book){
        Auth::user()->book()->detach($book);
        return redirect('/')->with('message', 'Listing deleted successfully');

    }
}
