<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Membre */

$this->title = 'Update Membre:';
$this->params['breadcrumbs'][] = ['label' => 'Membres', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->mat, 'url' => ['view', 'id' => $model->mat]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="mainBox">
	<div class="membre-update">

    <h1 class="blue"><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

</div>
