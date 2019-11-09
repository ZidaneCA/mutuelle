<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Membre */

$this->title = $model->mat;
$this->params['breadcrumbs'][] = ['label' => 'Membres', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
$array = ['Non','Oui'];
?>
<div class="mainBox">
    <div class="membre-view">

    <h1 class="blue"><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Modifier', ['update', 'id' => $model->mat], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Supprimer', ['delete', 'id' => $model->mat], [
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
            ['label' => 'Matricule', 'value' => $model->mat],
            'nom',
            'prenom',
            'sex',
            [ 
                'label' => 'Admin ?',
                'value' => $array[$model->admin],
            ],
            ['label' => 'Telephone', 'value' => $model->tel],
            'email:email',
            'adresse',
            'domicile',
            'photo',
        ],
    ]) ?>

</div>

</div>
