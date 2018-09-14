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

    $("#partie1, #partie2").hide();

    $('#partie3').show();
    for (var n = 1; n <= nbrVille; n++) {
        $("#SimuVille" + n).show();
    }
})


function chrono() {
    var nbrVille = $("#nbrVille").val();
    // console.log(nbrVille);

    var nbrAnneeSimu = parseInt($("#nbrAnneeSimu").val());
    var annee = parseInt($("#chrono").html());

    for (var n = 1; n <= nbrVille; n++) {
        var popInit = parseInt($("#popInitial" + n).val());
        var txNat = parseFloat($("#txNatalite" + n).val());
        var txMort = parseFloat($("#txMortalite" + n).val());
        $("#evolutionPop" + n).html(popInit);
        $('#anneeSimuCsv' + n).html(nbrAnneeSimu);
        $('#popInitCsv' + n).html(popInit);
        $('#txNatCsv' + n).html(txNat);
        $('#txMortCsv' + n).html(txMort);

    }
    console.log('popinit:' + popInit)
    console.log('n' + n)
    var chrono = setInterval(function () {
            $("#chrono").html(annee);

            for (var n = 1; n <= nbrVille; n++) {
                console.log(n);

                var population = parseInt($("#evolutionPop" + n).html());
                var calculPop = Math.round(population + (population * txNat) - (population * txMort));
                $("#evolutionPop" + n).html(calculPop);
                console.log('cal=' + calculPop, txNat, txMort, population);

                test(n);

            }

            annee++;

            if (annee >= nbrAnneeSimu) {
                clearInterval(chrono);
                $('#partie3').hide();
                $('#partie4').show();

            }
        },
        100);

}


$("#recommencer").click(function () {
    location.reload();
})

// $("#csv").click(function (){

// })

function changeImg() {
    var min = 1;
    var max = 36;

    var img = max - min;
    var genereImgVille1 = Math.floor(Math.random() * img) + min;
    var genereImgVille2 = Math.floor(Math.random() * img) + min;
    var genereImgVille3 = Math.floor(Math.random() * img) + min;
    $("#imgVille1").append("<img src='img/" + genereImgVille1 + ".svg'>");
    $("#imgVille2").append("<img src='img/" + genereImgVille2 + ".svg'>");
    $("#imgVille3").append("<img src='img/" + genereImgVille3 + ".svg'>");
}

function test(n) {

    var population = parseInt($("#evolutionPop" + n).html());

    if (population < 1000) {
        changeImg();
        console.log('trop nul');
    } else if (population <= 10000) {
        console.log('plop');
        var nbBat = Math.round(population / 1000);
        var i = 0;
        while (i < nbBat) {
            changeImg();
            i++;
            console.log(nbBat);
        }
    } else {
        console.log('boouuuu');
        var nbBat2 = Math.round(10 + ((population - 10000) / 10000));
        var n = 0;
        while (n < nbBat2) {
            changeImg();
            n++;
            console.log(nbBat2);
        }
    }

}

// var anSimu = $("#nbrAnneeSimu").val();
// var nbCata = Math.floor(Math.random());

// if (anSimu < 50) {
//     nbCata = (0 - 1);
// } else if (anSimu >= 50 && anSimu < 500) {
//     nbCata = (1 - 10);
// } else if (anSimu >= 500 && anSimu < 10000) {
//     nbCata = (2 - 31);
// } else {
//     nbCata = (4 - 54);
// }



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