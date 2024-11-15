<?php

namespace App\Http\Controllers;

use App\Models\Film;
use App\Models\Genre;
use Illuminate\Http\Request;


class FilmController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        return view("film/index", ["films" => Film::all()]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("film/create", ["genres" => Genre::all()]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validate = $request->validate([
            "title"=> "required",
            "director"=> "required",
            "year"=> "required",
            "genre"=> "required|exists:genres,id",
        ]);

        $film = new Film();
        $film->title = $request->title;
        $film->year = $request->year;
        $film->genre_id = $request->genre;
        $film->director = $request->director;

        if ($film->save()) {
            return redirect()->back()->with("success","Sikeresen rögzítetted a filmet!");
        } else {
            return redirect()->back()->with("error","Sikertelen rögzítés!");
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Film $film)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Film $film)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateFilmRequest $request, Film $film)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Film $film)
    {
        //
    }
}
