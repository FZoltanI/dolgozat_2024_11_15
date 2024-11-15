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
        $films = null;
        if ($request->has("title")){
            $films = Film::where("title", "LIKE", "%" . $request->title . "%")->get();
        } else {
            $films = Film::all();
        }

        return view("film/index", compact("films"));
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
    public function show($id)
    {
        return view("film/show", ["filmData"=>Film::find($id)]);
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
    public function destroy($id)
    {
        $film = Film::find($id);
        
        if ($film->delete()){
            return redirect()->route("index_film")->with("success","Sikeres törlés!");
        } else {
            return redirect()->route("index_film")->with("error","Hiba a törlés közben!");
        }

    }
}
