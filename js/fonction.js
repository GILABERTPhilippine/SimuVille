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

    var nbrAnneeSimu = parseInt($("#nbrAnneeSimu").val());
    var annee = parseInt($("#chrono").html());

    var chrono = setInterval(function () {
        $("#chrono").html(annee);

        // for (var n = 0; n < $("?").val(); n++) {
        //     evolution(n);
        // }
        annee++;

        if (annee > nbrAnneeSimu) {
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

// function evolPopultion() {
//     var anSimu = $("#nbrAnneeSimu").val();
//     var popInit = $("#popInitial").val();
//     var txNat = $("#txNatalite").val();
//     var txMort = $("#txMortalite").val();

//     switch (anSimu) {
//         case 'Eau':
//             var population = popInit + (popInit * txNat) - (popInit * txMort) - (popInit * 5 / 100)
//             break;
//         case 'Feu':
//             var population = popInit + (popInit * txNat) - (popInit * txMort) - (popInit * 8/ 100)
//             break;
//         case 'Terre':
//             var population = popInit + (popInit * txNat) - (popInit * txMort) - (popInit * 10 / 100)
//             break;
//         case 'Vent':
//             var population = popInit + (popInit * txNat) - (popInit * txMort) - (popInit * 4/ 100)
//             break;
//         case 'Epidémie':
//             var population = popInit + (popInit * txNat) - (popInit * txMort) - (popInit * 36 / 100)
//             break;
//         case 'Guerre':
//             var population = popInit + (popInit * txNat) - (popInit * txMort) - (popInit * 47 / 100)
//             break;
//         case 'Pas de catastrophe':
//             var population = popInit + (popInit * txNat) - (popInit * txMort)
//             break;

//     }
// }