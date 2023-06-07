<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Commande;
use App\Models\Categorie;
class CommandeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $commandes = Commande::all();
        return view('commandes', compact('commandes'));
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
        $request->validate([
            'titre' => 'required|max:255',
            'nombreCommande' => 'required|integer|min:0',
            'prix' => 'required|integer|min:0',
            'description' => 'required',
            'categorie_id' => 'required|exists:categories,id',
        ]);
        $imagePath = $request->file('image')->store('images', 'public');
    
        Commande::create([
            'titre' => $request->titre,
            'nombreCommande' => $request->nombreCommande,
            'image' => $imagePath,
            'prix' => $request->prix,
            'description' => $request->description,
            'categorie_id' => $request->categorie_id,
        ]);
        return redirect()->route('commandes');
        
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
        $categories = Categorie::all();
        return view('commandes.edit', compact('commande', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $request->validate([
            'titre' => 'required|max:255',
            'nombreCommande' => 'required|integer|min:0',
            'prix' => 'required|integer|min:0',
            'description' => 'required',
            'categorie_id' => 'required|exists:categories,id',
        ]);
        $commande = Commande::findOrFail($id);
        $commande->update($request->all());
        return redirect()->route('commandes.edit', $id)->with('success', 'Commande updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $commande = Commande::findOrFail($id);
        $commande->delete();
        return redirect()->route('commandes.create')->with('success', 'Commande deleted successfully');
    
    }
}
