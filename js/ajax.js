$(document).ready(function() {


    $('form.delete').on('submit', function (e){
        e.preventDefault();
        let data = {};
        data.id = $(this).find('input[name="id"]').val();
        data.delete = true;
        console.log($(this).find('input[name="id"]').val())
        console.log($(this))
        $.post("pokemonManager.php", data ,function() {

        })
            .done(function (result){
                $('#listFav').html(result);
            })
            .fail(function(error) {
                $('#response').html("Pokemon pas rajouter en DB");
                console.log('error', error);
            });
    })



    $('#favoris').on('submit', function (e){
        e.preventDefault();
        let data = {};
        data.name = $(this).find('input[name="name"]').val();
        data.sprite = $(this).find('input[name="sprite"]').val();
        data.fav = true;
        $.post("pokemonManager.php", data ,function() {

        })
            .done(function (result){
                $('#listFav').html(result);
            })
            .fail(function(error) {
                $('#response').html("Pokemon pas rajouter en DB");
                console.log('error', error);
            });
    })

    $('form#search').on('submit', function(e) {
        e.preventDefault();
        let data = {};
        data.name = $(this).find('input[name="name"]').val().toLowerCase();
        let url = "https://pokeapi.co/api/v2/pokemon/"+data.name;
        $.get(url, data, function() {

        })
            .done(function(result) {
                console.log(result)
                $('h2#pokemon').text(result.name);
                $('img#sprite').attr('src', result.sprites.front_default);$('#result p').html("");
                $('#favoris').html('<input type="hidden"  name="name" value="'+result.name+'"><input type="hidden" name="sprite" value="'+result.sprites.front_default+'"><input type="submit" value="rajouter au favoris" id="favoris">');
                let abilities = "";
                result.abilities.map(function (ability){
                    abilities += "<td>"+ability.ability.name+"</td>";
                });
                $('tr#listAbilities').html(abilities);
                let moves = ""
                result.moves.map(function (move){
                    moves += "<tr><td>"+move.move.name+"</td></tr>";
                });
                $("table#moves").html(moves);
                let types = "";
                result.types.map(function (type){
                    types += "<td>"+type.type.name+"</td>";
                });
                $('tr#listTypes').html(types);
            })
            .fail(function(error) {
                $('h2#pokemon').text("");
                $('img#sprite').attr('src', "" );
                $('#result p').html("Pokemon pas trouver");
                $('#favoris').text("");
                console.log('error', error);
            });
    });


});
