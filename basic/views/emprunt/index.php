<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\EmpruntSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Emprunts';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="mainBox">
    <div class="emprunt-index">

    <h1 class="blue"><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Emprunter', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            ['label' => 'Matricule Membre', 'attribute' => 'matMembre',],
            'montant',
            ['label' => 'Date Emprunt', 'attribute' => 'dateEmp',],
            ['label' => 'Date Limit', 'attribute' => 'delais',],
            ['label' => 'Matricule Expediteur', 'attribute' => 'matExp',],

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
</div>

