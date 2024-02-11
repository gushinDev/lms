<?php

namespace App\Http\Controllers;

use App\Modules\Statement\Models\Statement;
use App\Movie;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class MovieController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $data = ['actor' => fake()->email, 'verb' => 'completed', 'object' => Str::uuid()->toString()];
        Statement::query()->create($data);
    }

    public function show()
    {
        dd(Movie::query()->get());
        return view('browse_movies', [
            'movies' => Movie::query()->get()
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Movie $movie)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Movie $movie)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Movie $movie)
    {
        //
    }
}
