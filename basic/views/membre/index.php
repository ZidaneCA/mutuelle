<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\MembreSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Incription';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="mainBox">
    <div class="membre-index">

    <h1 class="blue"><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Nouvelle Membre', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            ['label' => 'Matricule', 'attribute' => 'mat',],
            'nom',
            'prenom',
            'sex',
            //'admin',
            ['label' => 'Telephone', 'attribute' => 'tel',],
            //'email:email',
            //'adresse',
            //'domicile',
            //'photo',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>

</div>
