<?php

require 'Classes/Autoloader.php';
Classes\Autoloader::register();

?>
<!doctype html>
<html lang="fr">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO"
        crossorigin="anonymous">

    <link rel="stylesheet" href="css/style.css">

    <title>SimuVille</title>
</head>

<body>
    <header class="jumbotron">
        <h1 class="text-center">Bienvenue sur SimuVille, le site de simulation de villes</h1>
    </header>
    <br>

    <!-- PARTIE 1 -->
    <div id="partie1">
        <div class="form-group">
            <label for="nbrVille">Déterminer le nombre de villes :</label>
            <input type="number" name="quantity" class="form-control" id="nbrVille" value="1" min="1" max="3">
        </div>
        <div class="form-group">
            <label for="nbrAnneeSimu">Déterminer le nombre d'années de la simulation : </label>
            <input type="number" name="quantity" class="form-control" id="nbrAnneeSimu" value="500" min="1" max="20000">
        </div>
        <br>
        <button type="button" id="btnparametre" class="btn btn-secondary">Paramétrer les villes</button>
    </div>

    <!-- PARTIE 2 -->
    <div id="partie2">
        <div class="row">
            <div class="col-10">
                <div class="row">
                <div class="col-4" id="ville1">
                <h3>Ville 1</h3>
                <div class="form-group">
                    <label for="popInitial">Population initiale</label>
                    <input type="number" name="quantity" class="form-control" id="popInitial1" value="2"  min="2" max="5000">
                </div>
                <div class="form-group">
                    <label for="txNatalite">Taux de natalité </label>
                    <input type="number" name="quantity" class="form-control" id="txNatalite1" value="0.024" step="0.001" min="0" max="1">
                </div>
                <div class="form-group">
                    <label for="txMortalite">Taux de mortalité</label>
                    <input type="number" name="quantity" class="form-control" id="txMortalite1" value="0.005" step="0.001" min="0" max="1">
                </div>
            </div>
            <div class="col-4" id="ville2">
                <h3>Ville 2</h3>
                <div class="form-group">
                    <label for="popInitial">Population initiale</label>
                    <input type="number" name="quantity" class="form-control" id="popInitial2" value="2" min="2" max="5000">
                </div>
                <div class="form-group">
                    <label for="txNatalite">Taux de natalité </label>
                    <input type="number" name="quantity" class="form-control" id="txNatalite2" value="0.024" step="0.001" min="0" max="1">
                </div>
                <div class="form-group">
                    <label for="txMortalite">Taux de mortalité</label>
                    <input type="number" name="quantity" class="form-control" id="txMortalite2" value="0.005"
                    step="0.001" min="0" max="1">
                </div>
            </div>
            <div class="col-4" id="ville3">
                <h3>Ville 3</h3>
                <div class="form-group">
                    <label for="popInitial">Population initiale</label>
                    <input type="number" name="quantity" class="form-control" id="popInitial3" value="2" min="2" max="5000">
                </div>
                <div class="form-group">
                    <label for="txNatalite">Taux de natalité </label>
                    <input type="number" name="quantity" class="form-control" id="txNatalite3" value="0.024" step="0.001" min="0" max="1">
                </div>
                <div class="form-group">
                    <label for="txMortalite">Taux de mortalité</label>
                    <input type="number" name="quantity" class="form-control" id="txMortalite3" value="0.005"
                    step="0.001" min="0" max="1">
                </div>
            </div>
                </div>
            </div>    
            <div class="col-2">
                <button type="button" id="btnSimulation" class="btn btn-danger btn-lg btn-block">Lancer la simulation</button>
            </div>
        </div>
    </div>

    <!-- PARTIE 3 -->
    <div id="partie3">
        <h3 class="text-center">Année : <span id="chrono">0</span></h3>
        <br>
        <div class="row">
            <div class="col-4" id="SimuVille1">
                <h3>Ville 1</h3>
                <h5>Population : <span id="evolutionPop1"></span>
                </h5>
                <div id="imgVille1"></div>
            </div>
            <div class="col-4" id="SimuVille2">
            <h3>Ville 2</h3>
                <h5>Population : <span id="evolutionPop2"></span>
                </h5>
                <div id="imgVille2"></div>
            </div>
            <div class="col-4" id="SimuVille3">
            <h3>Ville 3</h3>
                <h5>Population : <span id="evolutionPop3"></span>
                </h5>
                <div id="imgVille3"></div>
            </div>
        </div>
    </div>

    <!-- PARTIE 4 -->
    <div id="partie4">
        <h5>Voici le résumé de votre simulation :</h5>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col" id="para">Paramétres</th>
                    <th scope="col">Ville 1</th>
                    <th scope="col">Ville 2</th>
                    <th scope="col">Ville 3</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <th scope="row">Nombre d'années de simulation</th>
                    <td id="anneeSimuCsv1"></td>
                    <td id="anneeSimuCsv2"></td>
                    <td id="anneeSimuCsv3"></td>   
                </tr>
                <tr>
                    <th scope="row">Population initiale</th>
                    <td id="popInitCsv1"></td>
                    <td id="popInitCsv2"></td>
                    <td id="popInitCsv3"></td>
                </tr>
                <tr>
                    <th scope="row">Taux de natalité</th>
                    <td id="txNatCsv1"></td>
                    <td id="txNatCsv2"></td>
                    <td id="txNatCsv3"></td>
                </tr>
                <tr>
                    <th scope="row">Taux de mortalité</th>
                    <td id="txMortCsv1"></td>
                    <td id="txMortCsv2"></td>
                    <td id="txMortCsv3"></td>
                </tr>
            </tbody>
        </table>
        <div class="row">
            <button type="button" class="btn btn-success" id="recommencer">Recommencer</button>
            &nbsp;
            <button type="button" class="btn btn-info" id="csv">Exporter en CSV</button>
        </div>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49"
        crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy"
        crossorigin="anonymous"></script>
    <script src="js/fonction.js"></script>
</body>

</html>

