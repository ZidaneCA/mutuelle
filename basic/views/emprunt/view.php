<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Emprunt */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Emprunts', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="mainBox">
    <div class="emprunt-view">

    <h1 class="blue"><?= Html::encode($this->title) ?></h1>

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
             ['label'=>'Matricule Membre', 'value' => $model->matMembre],
            'montant',
             ['label'=>'Date d\'emprunt', 'value' => $model->dateEmp],
            'delais',
            ['label'=>'Matricule d\'expediteur', 'value' => $model->matExp],
        ],
    ]) ?>

</div>
</div>

