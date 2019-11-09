<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\RembourseSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Rembourse';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="mainBox">
    <div class="rembourse-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Rembourser', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'idEmp',
            'montant',
            'date',
             ['label' => 'Matricule Percepteur', 'attribute' => 'matPercept',],

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>

</div>
