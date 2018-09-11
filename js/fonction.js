$("#partie2").hide();
$("#partie3").hide();
$("#partie4").hide();

// $(document).ready(function () {

$("#btnparametre").click(function () {
    // var nbrVille = $("#nbrVille").val();
    $(this).hide();
    // $("#nbrVille").collapse("show");
    $("#partie2").show();
});

$("#btnSimulation").click(function () {
    $(this).hide();
    $("#partie1, #partie2").hide();
    $('#partie3').show().delay(1000).hide();
    $('#partie4').hide().delay(1000).show();
})
// });

function affVille() {
    var nbrVille = $("#nbrVille").val();

    for (var i = 1; i < nbrVille; i++) {
        nbrVille + i
    }

}

function chrono() {

    var nbrVille = $("#nbrVille").val();
    var nbrAnneeSimu = $("#nbrAnneeSimu").val();

    var annee = parseInt($(".chrono").html());

    var chrono = setInterval(function () {
        $(".chrono").html(annee);

        for (var n = 0; n < $("?").val(); n++) {
            evolution(n);
        }
        annee++;

        if (annee > nbrAnneeSimu) {
            clearInterval(chrono);
        }
    }, 100);
}