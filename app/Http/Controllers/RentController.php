<?php

namespace App\Http\Controllers;

use App\Models\Rent;
use Illuminate\Http\Request;


class RentController extends Controller
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
    public function update(UpdateRentRequest $request, Rent $rent)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Rent $rent)
    {
        //
    }
}
