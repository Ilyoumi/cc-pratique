<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Commande;
class CommandeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $commandes = Commande::all();
        return view('commandes.index', compact('commandes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('commandes.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        Commande::create($request->all());
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        $commande = Commande::findOrFail($id);
        return view('commandes.show', compact('commande'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $commande = Commande::findOrFail($id);
        return view('commandes.edit', compact('commande'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $commande = Commande::findOrFail($id);
        $commande->update($request->all());
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $commande = Commande::findOrFail($id);
        $commande->delete();
    }
}