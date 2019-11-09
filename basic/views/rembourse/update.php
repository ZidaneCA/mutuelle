<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Rembourse */

$this->title = 'Update Rembourse: ';
$this->params['breadcrumbs'][] = ['label' => 'Rembourses', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="mainBox">
	<div class="rembourse-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

</div>
