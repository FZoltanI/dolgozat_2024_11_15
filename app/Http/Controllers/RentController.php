<?php

namespace App\Http\Controllers;

use App\Models\Rent;
use App\Models\Genre;
use Illuminate\Http\Request;


class RentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index1()
    {
        return view("rent/rented", ["rented" => Rent::whereNull("rent_end")->get()]);
    }

    public function index2(Request $request)
    {
        $genres = Genre::all();
        $rentals = null;
        
        if ($request->has("filter")){
            $filter_title= $request->title;
            $filter_genre= $request->genre;

            $rentals = Rent::where("name", "LIKE", "%" . $request->name . "%")
                ->where("rent_start", "LIKE", $request->rent_start)
                ->where("rent_end", "LIKE", $request->rent_end)
                ->whereHas("film", function ($query){
                    GLOBAL $filter_title;
                    $query->where("title", "LIKE", "%" . $filter_title . "%");
                })
                ->whereHas("film", function ($query){
                    GLOBAL $filter_genre;
                    $query->where("genre_id", "LIKE", $filter_genre);
                })
                ->get();
        } else {
            $rentals = Rent::all();
        }

        return view("rent/rentals", compact("rentals", "genres"));
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
    public function store(Request $request)
    {
        $validate = $request->validate([
            "film_id"=> "required|exists:films,id",
            "kolcsonzo"=> "required",
            "kolcsonzes"=> "required",
        ]);

        $rent = new Rent();
        $rent->name = $request->kolcsonzo;
        $rent->film_id = $request->film_id;
        $rent->rent_start = $request->kolcsonzes;

        if ($rent->save()){
            return redirect()->route("index_film")->with("success","Sikeres kölcsönzés");
        } else {
            return redirect()->back()->with("error","Hiba a kölcsönzés közben!");
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Rent $rent)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Rent $rent)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $validate = $request->validate([
            "rent_id"=> "required|exists:rents,id",
            "rent_end"=> "required",
        ]);

        $rent = Rent::find( $request->rent_id );

        if ($rent->rent_start <= $request->rent_end){
            $rent->rent_end = $request->rent_end;

            if ($rent->save()){
                return redirect()->route("index_rented")->with("success","Sikeres rögzítés!");
            } else {
                return redirect()->route("index_rented")->with("error","Hiba lépett fel!");
            }
        } else {
            return redirect()->route("index_rented")->with("error","Nem lehet a visszahozatal dátuma korábban mint a kölcsönzés!");
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Rent $rent)
    {
        //
    }
}
