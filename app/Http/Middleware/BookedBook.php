<?php

namespace App\Http\Middleware;

use App\Models\Book;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Symfony\Component\HttpFoundation\Response;

class BookedBook
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {   
        //dd($request->book->user->last()->pivot);
        $book = $request->route()->parameter('book');
        if ($book->user()->exists() && !$book->user->last()->pivot->returned_at) {
            if ($book->user->last()->id != auth()->id()) {
                return redirect('/')->with('error', 'This book is already booked by someone else');
            }
        }

        return $next($request);
    }
}
