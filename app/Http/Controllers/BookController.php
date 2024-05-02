<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Http\Requests\StoreBookRequest;
use App\Http\Requests\UpdateBookRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Routing\Controller;
use App\Models\BookUser;


class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $books = Book::whereDoesntHave('user')->orWhereHas('user', function ($query) {
            $query->whereNotNull('returned_at');
        })->latest()->filter(request(['genre', 'search']))->paginate(6);
    
        return view('index', compact('books'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreBookRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Book $book)
    {   
        // //$test = $book->user->last()->pivot;
        // //dd(isset($book->user->last()->pivot->returned_at));
        // if ($book->user()->exists()) {
        //     if(!$book->user->last()->pivot->returned_at){
        //         if($book->user->last()->id != Auth::id()){
        //             return redirect('/')->with('error', 'This book is already booked');
        //         }
        //     }
        // }
        return view('show', [
            'book' => $book
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Book $book)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateBookRequest $request, Book $book)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Book $book)
    {
        // 

    }

}
