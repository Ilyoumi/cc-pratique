@extends('layouts.app')

@section('content')
    <h1>Liste des commandes</h1>

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Titre</th>
                <th>Nombre de commandes</th>
                <th>Image</th>
                <th>Prix</th>
                <th>Catégorie</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($commandes as $commande)
                <tr>
                    <td>{{ $commande->id }}</td>
                    <td>{{ $commande->titre }}</td>
                    <td>{{ $commande->nombreCommande }}</td>
                    <td>{{ $commande->image }}</td>
                    <td>{{ $commande->prix }}</td>
                    <td>{{ $commande->categorie->nom }}</td>
                    <td>
                        <img src="{{ asset('storage/' . $commande->image) }}" alt="Commande Image" width="100">
                    </td>
                    
                    <td>
                        <a href="{{ route('commandes.show', $commande->id) }}">Voir</a>
                        <a href="{{ route('commandes.edit', $commande->id) }}">Modifier</a>
                        <form action="{{ route('commandes.destroy', $commande->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit">Supprimer</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
