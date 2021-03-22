$(document).ready(function() {

    $('form').on('submit', function(e) {
        e.preventDefault();
        let data = {};
        data.name = $(this).find('input[name="name"]').val().toLowerCase();
        let url = "https://pokeapi.co/api/v2/pokemon/"+data.name;
        $.get(url, data, function() {

        })
            .done(function(result) {
                let img = "";

                console.log($(this).find('input[name="favoris"]'));
                for (const property in result.sprites) {
                    if(result.sprites[property] != null && typeof result.sprites[property] == "string"){
                        img += '<img src="'+result.sprites[property]+'"/>';
                    }
                }
                $('#response').html(img);
                $('#response').append(result.name)

            })
            .fail(function(error) {
                $('#response').html("Pokemon pas trouver");
                console.log('error', error);
            });
    });


});