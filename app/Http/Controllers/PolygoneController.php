<?php

namespace App\Http\Controllers;
use App\Models\Polygones;
use Illuminate\Http\Request;

class PolygoneController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function __construct(){
        $this-> polygone = new Polygones();
    }
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
        //
         //validate request
         $request->validate(
            [
                'name' => 'required',
                'geom' => 'required',

            ],
            [
                'name.requres' => 'name is required',
                'description.requres' => 'description is required',
            ],

        );
        $data = [
            'name' => $request-> name,
            'description' => $request-> description,
            'geom' => $request-> geom,
        ];



        // Jika proses $this->point->create($data) error akan melakukan redirect
        if(!$this->polygone->create($data)){
            return redirect()->back()->with('error','Failed to create polygone');
        }
        return redirect()->back()->with('success','Polygone create succesfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
