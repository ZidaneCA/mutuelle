<?php

/* @var $this yii\web\View */

$this->title = 'Mutuelle-admin';
?>
<div class="site-index">

    <div class="jumbotron">
        <h1>Bienvenue <?= $_SESSION['user']['nom']?></h1>

        <p class="lead">à la Mutuelle de l'ENSP</p>
    </div>

    <div class="body-content">

        <div class="row">
            <div class="col-lg-4">
                <h2>Epargner</h2>

                <p> Ici, vous pouvez epargner de l'argent d'un membre donnée.</p>

                <p><a class="btn btn-default" href="index.php?r=epargne%2Findex">Epargner &raquo;</a></p>
            </div>
            <div class="col-lg-4">
                <h2>Emprunter</h2>

                <p>Ici, un membre a la possibilite d'emprunter une certaine somme et de rembourser avant une certaine date
                avec un certain taux d'interet.</p>

                <p><a class="btn btn-default" href="index.php?r=emprunt%2Findex">Emprunter &raquo;</a></p>
            </div>
            <div class="col-lg-4">
                <h2>Rembourser</h2>

                <p>Cela s'effectue après avoir emprunter de l'argent.</p>

                <p><a class="btn btn-default" href="index.php?r=rembourse%2Findex">Rembourser &raquo;</a></p>
            </div>
        </div>

    </div>
</div>
