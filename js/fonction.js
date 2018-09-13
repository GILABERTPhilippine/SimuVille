$("#partie2, #partie3, #partie4, #ville1, #ville2, #ville3, #SimuVille1, #SimuVille2, #SimuVille3").hide();

$("#btnparametre").click(function () {
    $(this).hide();
    var nbrVille = $("#nbrVille").val();

    $('#partie2').show();
    for (var i = 1; i <= nbrVille; i++) {
        $("#ville" + i).show();
    }

})

$("#btnSimulation").click(function () {
    var nbrVille = $("#nbrVille").val();

    chrono();
    changeImg();

    $("#partie1, #partie2").hide();

    $('#partie3').show();
    for (var n = 1; n <= nbrVille; n++) {
        $("#SimuVille" + n).show();
    }
})


function chrono() {

    var nbrAnneeSimu = parseInt($("#nbrAnneeSimu").val());
    var annee = parseInt($("#chrono").html());
    var popInit = parseInt($("#popInitial").val());
    var txNat = parseFloat($("#txNatalite").val());
    var txMort = parseFloat($("#txMortalite").val());

    $(".evolutionPop").html(popInit);

    var chrono = setInterval(function () {
        $("#chrono").html(annee);
        var population = parseInt($(".evolutionPop").html());
        var calcul = Math.round(population + (population * txNat) - (population * txMort));
        $(".evolutionPop").html(calcul);
        console.log(calcul);

        // for (var n = 0; n < $("#nbrAnneeSimu").val(); n++) {
        //     evolution(n);
        // }
        annee++;

        if (annee >= nbrAnneeSimu) {
            clearInterval(chrono);
            $('#partie3').hide();
            $('#partie4').show();
        }
    }, 100);
}

$("#recommencer").click(function () {
    location.reload();
})

// $("#csv").click(function (){

// })

function changeImg(min, max) {
    var min = 1;
    var max = 36;

    var img = max - min;
    var genereImgVille1 = Math.floor(Math.random() * img) + min;
    var genereImgVille2 = Math.floor(Math.random() * img) + min;
    var genereImgVille3 = Math.floor(Math.random() * img) + min;
    $("#imgVille1").attr('src', 'img/' + "" + genereImgVille1 + "" + '.svg');
    $("#imgVille2").attr('src', 'img/' + "" + genereImgVille2 + "" + '.svg');
    $("#imgVille3").attr('src', 'img/' + "" + genereImgVille3 + "" + '.svg');
}

function test() {
    var anSimu = $("#nbrAnneeSimu").val();
    var nbCata = Math.floor(Math.random());

    if (anSimu < 50) {
        nbCata = (0 - 1);
    } else if (anSimu >= 50 && anSimu < 500) {
        nbCata = (1 - 10);
    } else if (anSimu >= 500 && anSimu < 10000) {
        nbCata = (2 - 31);
    } else {
        nbCata = (4 - 54);
    }


    if (population < 1000) {

    } else if (population <= 10000) {
        var nbBat = Math.round(population / 1000);
        var resul = genereImg + nbBat
    } else {
        var nbBat2 = Math.round(10 + ((population - 10000) / 10000));
        var resul2 = genereImg + nbBat2
    }
}


// function evolPopulation() {
//     var anSimu = $("#nbrAnneeSimu").val();
// var popInit = parseInt($("#popInitial").val());
// var txNat = parseFloat($("#txNatalite").val());
// var txMort = parseFloat($("#txMortalite").val());
// var population = Math.round(popInit + (popInit * txNat) - (popInit * txMort));
// $(".evolutionPop").html(population);
// console.log(population);

//     // CATASTROPHE
//     var typeCata = {
//         "Eau": 5,
//         "Feu": 8,
//         "Terre": 10,
//         "Vent": 4,
//         "Epidémie": 36,
//         "Guerre": 47,
//         "Pas de catastrophe": 0
//     }
//     console.log(typeCata);

//     for (i = 0; i < nbCata; i++) {
//         switch (typeCata) {
//             case 'Eau':
//                 population - (popInit * 5 / 100)
//                 break;
//             case 'Feu':
//                 population - (popInit * 8 / 100)
//                 break;
//             case 'Terre':
//                 population - (popInit * 10 / 100)
//                 break;
//             case 'Vent':
//                 population - (popInit * 4 / 100)
//                 break;
//             case 'Epidémie':
//                 population - (popInit * 36 / 100)
//                 break;
//             case 'Guerre':
//                 population - (popInit * 47 / 100)
//                 break;
//             case 'Pas de catastrophe':
//                 population
//                 break;

//         }
//     }
// }