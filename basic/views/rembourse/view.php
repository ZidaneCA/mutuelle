<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Rembourse */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Rembourses', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="mainBox">
    <div class="rembourse-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Modifier', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Supprimer', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            ['label'=>'ID d\'emprunt', 'value' => $model->idEmp],
            'montant',
            'date',
            ['label'=>'Matricule de Percepteur', 'value' => $model->matPercept],
        ],
    ]) ?>

</div>
</div>

