function envoie() {

    event.preventDefault(); //empeche le raffranchissement

    var post_titre = $("#titre").val(); 
    var post_editeur = $("#editeur").val();
    var post_prix = $("#prix").val();
    var post_resume = $("#resume").val();

    $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        method: "POST", // la methode utilise par le forumalaire
        url: "api/jeux/add", //la cible du formulaire pour traitre
        data: { 
            titre : post_titre,
            editeur : post_editeur,
            prix : post_prix,
            resume : post_resume
        },
        dataType: "json"
      })
    .done(function(data) {
        $('#temporaire').append(
            '<p id=jeu_' + data.id + '>' +
            'Titre : ' + data.titre +
            '. Éditeur : ' + data.editeur +
            '. Prix : ' + data.prix +
            ' €. Resumer : ' + data.resume + '. ' 
            + "<button onclick='suppression( " + data.id + " )'>Supprimer</button>"
            + "</p>"
        );

        //affichage(data);  //affichage les données (voire plus bas)
        //console.log(data);
    })
    .fail(function(status) {
        if (status.status === 422){
            let error = status.responseJSON.errors;
            console.log(error);
        }
        //alert("erreur 404");
    })
};

function getList(){

    $.ajax({
        method: "GET",
        url: "/api/jeux/all",
        dataType: "json"
    }).done(function(data) {
        console.log(data);
    }).fail(function(){
        console.log('erreur 404 - getList');
    })
    
}

getList();
