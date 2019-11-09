<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Epargne */

$this->title = 'Update Epargne: ';
$this->params['breadcrumbs'][] = ['label' => 'Epargnes', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="mainBox">
	<div class="epargne-update">

    <h1 class="blue"><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

</div>
