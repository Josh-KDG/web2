<?php

namespace App\Http\Controllers;

use App\Models\Intendant;
use Illuminate\Http\Request;

class IntendantController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

            $Intendants = Intendant::with('utilisateursEnregistres.personne')->paginate(10);

            return view('admin.property.FormErIN', compact('Intendants'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.property.FormIN', [
            'Intendants' => new Intendant(),

        ], );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
