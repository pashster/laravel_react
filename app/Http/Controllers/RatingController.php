<?php

namespace App\Http\Controllers;

use App\Book;
use App\Http\Resources\RatingResource;
use App\Rating;
use Illuminate\Http\Request;

class RatingController extends Controller
{
    /**
     * @param Request $request
     * @param Book $book
     * @return RatingResource
     */
    public function store(Request $request, Book $book)
    {
        $rating = Rating::firstOrCreate(
            [
                'user_id' => $request->user()->id,
                'book_id' => $book->id,
            ],
            ['rating' => $request->rating]
        );

        return new RatingResource($rating);
    }
}
