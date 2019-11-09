<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\EpargneSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Epargnes';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="mainBox">
    <div class="epargne-index">

    <h1 class="blue"><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Epargner', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            ['label' => 'Matricule Membre', 'attribute' => 'matMembre',],
            'montant',
            'date',
            ['label' => 'Matricule Percepteur', 'attribute' => 'matPercept',],

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>

</div>
