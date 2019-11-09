<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Fondsociale */

$this->title = 'Faire un Fond Social';
$this->params['breadcrumbs'][] = ['label' => 'Fondsociales', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="mainBox">
	<div class="fondsociale-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
</div>
