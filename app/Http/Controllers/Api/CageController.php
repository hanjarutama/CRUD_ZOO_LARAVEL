<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\Cage;
use App\Models\Animal;

class CageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cages = Cage::with('animals')->get();

        return response()->json([
            'code' => 200,
            'status' => true,
            'massage' => "succes get all cage",
            'data' => $cage
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $cage = Cage::create([
            'namaCage' => $request->namaCage,
            'description' => $request->description

        ]);

        return response()->json([
            'code' => 200,
            'status' => true,
            'massage' => "succes create cage",
            'data' => $cage
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Cage $cage)
    {
        $cage = Cage::where('id', $cage->id)->with('animals')->first();
        return response()->json([
            'code' => 200,
            'status' => true,
            'massage' => "succes get cage with id = ".$cage->id,
            'data' => $cage
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Cage $cage)
    {
        $cage ->update([
            'namaCage' => $request->namaCage,
            'description' => $request->description

        ]);
        return response()->json([
            'code' => 200,
            'status' => true,
            'massage' => "succes update cage with id = ".$cage->id,
            'data' => $cage
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Cage $cage)
    {
        $cage->delete();
        return response()->json([
            'code' => 200,
            'status' => true,
            'massage' => "succes delete cage with id = ".$cage->id,
            'data' => ""
        ]);
    }
}
