<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Rembourse */

$this->title = 'Rembourser';
$this->params['breadcrumbs'][] = ['label' => 'Rembourses', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="mainBox">
	<div class="rembourse-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

</div>
