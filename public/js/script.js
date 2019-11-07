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
        console.log(data);
        affichage(data);

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

////////////////////////////////////////////////////////////////////////////*

function getList(){

    $.ajax({
        method: "GET",
        url: "/api/jeux/all",
        dataType: "json"
    }).done(function(datas) {
        console.log(datas);
        $.each(datas,function(index,data){ 
            affichage(data);
        });
    }).fail(function(){
        console.log('erreur 404 - getList');
    })
    
}

getList();


/**
 * 
 * @param {*} data objet Data provenant du serveur
 */
function affichage(data) { //fonction affichage (quand on "submit" le formulaire)
    $('#temporaire').append(
        '<p id=jeu_' + data.id + '>' +
        'Titre : ' + data.titre +
        '. Éditeur : ' + data.editeur +
        '. Prix : ' + data.prix +
        ' €. Resumer : ' + data.resume + '. ' 
        + "<button onclick='suppression(" + data.id + ")'>Supprimer</button>"
        + "</p>"
    );
}


function suppression(id) {

    event.preventDefault(); //empeche le raffranchissement

    $.ajax({
       method: "GET", // la methode utilise par le forumalaire
       url: "/api/jeux/supp", //la cible du formulaire pour traitre
       data: { 
           id : id
       },
       dataType: "json" // le type de données qu'on envoi
     })
    .done(function(data) {
        console.log(data);
        $("#jeu_"+data).fadeOut("slow").remove(); //fais disparaitre les elements
    })
    .fail(function() {
       alert("erreur 404 - suppression");
    })
};