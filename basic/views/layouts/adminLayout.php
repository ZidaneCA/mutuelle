<?php

/* @var $this \yii\web\View */
/* @var $content string */

use app\widgets\Alert;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

<div class="wrap">
    <?php
    NavBar::begin([
        'options' => [
            'class' => 'navbar-inverse navbar-fixed-top',
        ],
    ]);
    echo Nav::widget([
        'options' => ['class' => 'navbar-nav navbar-right'],
        'items' => [
            ['label' => 'Accueil', 'url' => ['/admin/index']],
            ['label' => 'Consulter', 'url' => ['/admin/consulter']],
            ['label' => 'Inscription', 'url' => ['/membre/index']],
            ['label' => 'Fond Social', 'url' => ['/fondsociale/index']],
            ['label' => 'Epargner', 'url' => ['/epargne/index']],
            ['label' => 'Emprunter', 'url' => ['/emprunt/index']],
            ['label' => 'Rembourser', 'url' => ['/rembourse/index']],
            ['label' => 'Parametres', 'url' => ['/parametres/index']],
           (
                '<li>'
                . Html::beginForm(['/site/logout'], 'post')
                . Html::submitButton(
                    ' Deconnecter (' . $_SESSION['user']['nom'] . ')',
                    ['class' => 'btn btn-link logout']
                )
                . Html::endForm()
                . '</li>'
            )
        ],
    ]);
    NavBar::end();
    ?>

    <div class="container">
        <?= Breadcrumbs::widget([
            //This is very vital and important to change the label and url of Home
            'homeLink' => ['label' => 'Accueil', 'url' => Yii::$app->getHomeUrl().'?r=admin',],
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?= Alert::widget() ?>
        <?= $content ?>
    </div>
</div>

<footer class="footer">
    <div class="container">
        <p class="black center-footer">&copy; Mutuelle <?= date('Y') ?></p>
    </div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
