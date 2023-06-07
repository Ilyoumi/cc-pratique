<!-- Formulaire pour ajouter une commande -->
<h1>Ajouter une commande</h1>

<form action="{{ route('commandes.store') }}" method="POST">
    @csrf
    <label for="titre">Titre:</label>
    <input type="text" name="titre" id="titre">

    <label for="nombreCommande">Nombre de commandes:</label>
    <input type="text" name="nombreCommande" id="nombreCommande">


    <button type="submit">Ajouter</button>
</form>
