<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.js" integrity="sha512-n/4gHW3atM3QqRcbCn6ewmpxcLAHGaDjpEBu4xZd47N0W2oQ+6q7oc3PXstrJYXcbNU1OHdQ1T7pAP+gi5Yu8g==" crossorigin="anonymous"></script>
    <!--  <script src="script.js"></script> -->
    <script src="js/ajax.js"></script>
</head>
<body class="bodyclass" id="bodyid">

<h2 id="teamFav">Pokemon favoris</h2>
<?php
include('models/entities/pokemon.php');
include('models/dao/pokemonDAO.php');
include('controllers/pokemonController.php');

$pokemonCon = new pokemonController();
$pokemonCon->index();

if(isset($_POST) && isset($_POST["fav"])){
    echo var_dump($_POST);
    $pokemon = array("name"=>$_POST["name"], "sprite"=>$_POST["sprite"]);
    $pokemonCon->store($pokemon);
}
?>
<section id="form">
    <form action="" id="search">
        <label for="name">Nom du pokemon : </label>
        <input type="text" name="name" value="nom du Pokemon" id="name">
        <input type="submit" value="submit">
    </form>
</section>
<section id="result">
    <h2 id="pokemon"></h2>
    <img src="" alt="" id="sprite">

    <p></p>
</section>
<form id="favoris" ></form>
</body>



