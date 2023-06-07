<!-- Formulaire pour modifier une commande -->
<h1>Modifier une commande</h1>

<form action="{{ route('commandes.update', $commande->id) }}" method="POST">
    @csrf
    @method('PUT')

    <label for="titre">Titre:</label>
    <input type="text" name="titre" id="titre" value="{{ $commande->titre }}">

    <label for="nombreCommande">Nombre de commandes:</label>
    <input type="text" name="nombreCommande" id="nombreCommande" value="{{ $commande->nombreCommande }}">


    <button type="submit">Modifier</button>
</form>
