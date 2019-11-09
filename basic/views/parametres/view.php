<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Parametres */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Parametres', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="mainBox">
    <div class="parametres-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Modifier', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            ['label' => 'ID', 'value' => $model->id],
            ['label' => 'Fond Social', 'value' => $model->fondsociale],
            ['label' => 'Pourcentage Interet', 'value' => $model->pourInteret],
            ['label' => 'Delais Remboursement (mois)','value' => $model->delaisRem],
            ['label' => 'Delais Fond Social (mois)','value' => $model->delaisFS],
        ],
    ]) ?>

</div>

</div>
