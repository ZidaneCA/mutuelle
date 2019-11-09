<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\ParametresSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Parametres';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="mainBox">
    <div class="parametres-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            ['label' => 'Fond Sociale', 'attribute' => 'fondsociale',],
            ['label' => 'Pourcentage Interet', 'attribute' => 'pourInteret',],
            ['label' => 'Delais Rembourse (mois)', 'attribute' => 'delaisRem',],
            ['label' => 'Delais Fond Sociale (mois)', 'attribute' => 'delaisFS',],

            ['class' => 'yii\grid\ActionColumn',
              'template' => '{view} {update}'
            ],
        ],
    ]); ?>
</div>

</div>
