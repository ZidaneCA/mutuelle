<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Fondsociale */

$this->title = 'Update Fondsociale: ';
$this->params['breadcrumbs'][] = ['label' => 'Fondsociales', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="mainBox">
	<div class="fondsociale-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

</div>
