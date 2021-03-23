<?php
include('models/entities/pokemon.php');
include('models/dao/pokemonDAO.php');
include('controllers/pokemonController.php');

$pokemonCon = new pokemonController();


if(isset($_POST) && isset($_POST["fav"])) {
    $pokemon = array("name" => $_POST["name"], "sprite" => $_POST["sprite"]);
    $pokemonCon->store($pokemon);
}

$pokemonCon->index();
