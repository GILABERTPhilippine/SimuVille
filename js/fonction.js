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
    var arrStat = [];
    var nbrVille = $("#nbrVille").val();
    var nbAnSimu = $("#nbrAnneeSimu").val();

    for (var i = 1; i <= nbrVille; i++) {
        var stat = {
            'populationInitiale': $("#popInitial" + i).val(),
            'tauxNatalite': $("#txNatalite" + i).val(),
            'tauxMortalite': $("#txMortalite" + i).val()
        }
        arrStat.push(stat);
    }

    chrono(arrStat, nbrVille, nbAnSimu);

    $("#partie1, #partie2").hide();

    $('#partie3').show();
    for (var n = 1; n <= nbrVille; n++) {
        $("#SimuVille" + n).show();
    }
})


function chrono(arrStat, nbrVille, nbAnSimu) {

    $.ajax({

        type: 'POST',
        url: 'creat_ville.php',

        data: {
            case: 'villes',
            nbrVille: nbrVille,
            tab: arrStat,
            nbAnSimu: nbAnSimu
        },

        success: function (data) {
            var recupData = JSON.parse(data);
            console.log(recupData);

            for (var i = 0; i < nbrVille; i++) {
                $('#popInitCsv' + (i + 1)).html(recupData[i][0]);
                $('#txNatCsv' + (i + 1)).html(recupData[i][1]);
                $('#txMortCsv' + (i + 1)).html(recupData[i][2]);
            }
        },


    });


    var nbrAnneeSimu = parseInt($("#nbrAnneeSimu").val());
    var annee = parseInt($("#chrono").html());

    for (var n = 1; n <= nbrVille; n++) {
        var popInit = parseInt($("#popInitial" + n).val());
        var txNat = parseFloat($("#txNatalite" + n).val());
        var txMort = parseFloat($("#txMortalite" + n).val());
        $("#evolutionPop" + n).html(popInit);
        $('#anneeSimuCsv' + n).html(nbrAnneeSimu);

    }

    var chrono = setInterval(function () {

            $("#chrono").html(annee);

            for (var n = 1; n <= nbrVille; n++) {
                // console.log(n);

                var population = parseInt($("#evolutionPop" + n).html());
                var calculPop = Math.round(population + (population * txNat) - (population * txMort));
                $("#evolutionPop" + n).html(calculPop);
                // console.log('cal=' + calculPop, txNat, txMort, population);

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
        // console.log('trop nul');
    } else if (population <= 10000) {
        // console.log('plop');
        var nbBat = Math.round(population / 1000);
        var i = 0;
        while (i < nbBat) {
            changeImg();
            i++;
            // console.log(nbBat);
        }
    } else {
        // console.log('boouuuu');
        var nbBat2 = Math.round(10 + ((population - 10000) / 10000));
        var n = 0;
        while (n < nbBat2) {
            changeImg();
            n++;
            // console.log(nbBat2);
        }
    }

}